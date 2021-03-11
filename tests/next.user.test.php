<?php


testUserRegister();
testUserRegisterResponse();


function testUserRegister() {
    $email = 'user-create' . time() . '@test.com';
    $pw = '12345a';
    $user = user()->register([EMAIL=>$email, PASSWORD=>$pw]);
    isTrue($user->hasError == false, 'no error on create user');

    $user = user()->register([EMAIL=>$email, PASSWORD=>$pw]);
    isTrue($user->hasError == true, 'error on same email');
    isTrue($user->getError() == e()->email_exists, 'email exists');
}
function testUserRegisterResponse() {
    $email = 'user-response' . time() . '@test.com';
    $pw = '12345a';
    $response = user()->register([EMAIL=>$email, PASSWORD=>$pw])->response();
    isTrue(is_array($response) && $response[CREATED_AT] > 0, 'create->response');
    $arr = explode('-', $response[SESSION_ID]);
    isTrue(count($arr) == 2 , 'sessionId');
}