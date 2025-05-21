<?php
// This is why an MVC model would've made more sense for this project...
// Well I learned something for next time, although for this project I won't fix
// (I am complaining about the usage of `class_exists()` for future reference)
if (!class_exists('LoginCallback')) {
    class LoginCallback {
        private string $loginCallback;
        private array $checkMatches;
        private array $possibleCallbacks = [
            'success' => 'success/Login Successful!',
            'logout' => 'success/Logout Successful!',
            'invalid_username' => 'error/Invalid Username!',
            'invalid_password' => 'error/Wrong Password!',
            'invalid_email' => 'error/Invalid E-Mail!',
            'Too Many Requests' => 'error/Too Many Requests!',
            'user_exists' => 'error/User Already Exists!',
        ];

        public function __construct(string $loginCallback, array $checkMatches) {
            $this->loginCallback = $loginCallback;
            $this->checkMatches = $checkMatches;
        }

        public function handle() {
            if ($this->checkMatches != ['all'] && !in_array($this->loginCallback, $this->checkMatches)) {
                return null;
            }

            $renderStatus = function (string $status, string $str): string {
                $strTranslated = tl($str);
                return "<p class='status-$status'>$strTranslated</p>";
            };

            $selectedCallback = explode('/', $this->possibleCallbacks[$this->loginCallback]);
            $statusType = $selectedCallback[0];
            $callbackString = tl($selectedCallback[1]);

            return "<p class='status-$statusType'>$callbackString</p>";
        }
    }
}

print (new LoginCallback($loginCallback, $checkMatches))->handle();