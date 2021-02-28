<?php
/**
 * @file user.class.php
 */
/**
 * Class User
 */
class User extends Entity {

    public Config $meta;
    public bool $loggedIn = false;

    public function __construct(public int $idx)
    {
        parent::__construct(USERS, $idx);
        $this->_setUid($idx);

        global $__login_user_profile;
        if ( isset($__login_user_profile) && $__login_user_profile && isset($__login_user_profile[IDX]) ) {
            $this->loggedIn = true;
        }
    }


    /**
     * 사용자 필드를 가져오는 getter
     *
     * 레코드가 없거나 값이 없으면 null 를 리턴한다.
     * 권장되지는 않는데, defines 에 정의되지 않은 필드(레코드)를 가져 올 때, 사용 가능하다.
     *
     *
     * @param $name
     * @return mixed
     *
     * 예)
     *  d( user(49)->password );
     *  d( user(49)->oooo === null ? 'is null' : 'is not null' );
     */
    public function __get($name) {
        return $this->data($name);
    }

    /**
     * 현재 객체에 회원 정보를 지정한다.
     * @param int $idx
     */
    private function _setUid(int $idx) {
        $this->idx = $idx;
        $this->meta = config(USER.'.'.$idx.'.');
    }

    /**
     * 현재 객체에 회원 idx 를 지정한다.
     * @param string $email
     * @return mixed
     * - 에러가 있으면 에러 코드를 리턴한다.
     * - 에러가 없으면, (password 필드를 포함하는) 회원 프로필 레코드를 리턴한다.
     */
    private function _setUserByEmail(string $email): mixed {
        $record = parent::get(EMAIL, $email);
        if ( !$record ) return e()->user_not_found_by_that_email;
        $this->_setUid($record[IDX]);
        return $record;
    }

    /**
     * 현재 사용자의 users 테이블 또는 meta(config) 테이블에서, field 의 값을 가져온다.
     *
     * @param string $field
     * @param mixed|null $_
     * @return mixed
     * - 에러이면, 에러 코드를 리턴한다.
     * - 필드가 존재하지 않으면 null 을 리턴한다.
     * - 그 외, 필드 값을 리턴한다.
     *
     * 예제)
     *  d( user(48)->get(PASSWORD) );
     */
    public function data(string $field): mixed {
        $record = $this->profile(unsetPassword: false);
        if ( e($record)->isError ) return $record;
        return isset($record[$field]) ? $record[$field] : null;
    }


    /**
     * 회원 가입을 한다.
     * @param array $in
     * @return int|string
     */
    public function register(array $in) {
        $in[PASSWORD] = encryptPassword($in[PASSWORD]);
        $idx = $this->create($in);
        if ( !$idx ) return e()->register_failed;
        return $idx;
    }

    /**
     * 회원 정보를 리턴한다.
     * meta(config) 에 설정된 값들도 같이 리턴한다.
     * @param bool $unsetPassword - false 이면, 비밀번호를 같이 리턴한다.
     * @return mixed
     *
     * 예제)
     * d( user(48)->profile() );
     */
    public function profile($unsetPassword=true) {
        if ( ! $this->idx ) return e()->idx_not_set;
        $profile = parent::get('idx', $this->idx);
        if ( !$profile ) return e()->user_not_found_by_that_idx;
        $profile[SESSION_ID] = getSessionId($profile);
        if ( $unsetPassword ) unset($profile[PASSWORD]);
        return $profile;
    }

    /**
     * @param string $email
     * @param string $password
     * @return mixed
     *
     * 예제)
     * d(user()->login(email: '...', password: '...');
     */
    public function login(string $email, string $password):mixed {
        if ( !$password ) return e()->empty_password;
        $profile = $this->_setUserByEmail($email);
        if ( isError($profile) ) return $profile;

        if ( ! checkPassword($password, $profile[PASSWORD]) ) return e()->wrong_password;
        return $this->profile();
    }


}

/**
 * User 는 uid 를 입력 받으므로 항상 새로 생성해서 리턴한다.
 *
 * $_COOKIE[SESSION_ID] 에 값이 있으면, 사용자가 로그인을 확인을 해서, 로그인이 맞으면 해당 사용자의 idx 를 기본 사용한다.
 * @param int $idx
 * @return user
 */
function user(int $idx=0): User
{
    return new User($idx);
}

/**
 * 로그인한 사용자의 User 객체이다.
 * @return User
 *
 * 예제)
 *  d(user()->profile()); // 결과. error_idx_not_set
 *  d(login()->profile()); // 로그인을 했으면, 사용자 프로필. 로그인을 안했으면 error_idx_not_set 에러
 *
 * 이 함수를 호출하기 전에, loggedIn() 함수를 호출해서, 로그인을 했는지 안했는지 볼 수 있다.
 */
function login(): User {
    global $__login_user_profile;
    return new User($__login_user_profile[IDX] ?? 0);
}




