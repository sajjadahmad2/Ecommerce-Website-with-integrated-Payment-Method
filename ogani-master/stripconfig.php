<?php
require('vendor/autoload.php');

$publishableKey="pk_test_51LpHMLKvhdBQwwfiYu3y5L1BYggwQJ8fLuvPsJHpAmqeNZVhm34DWSYYgKeVUTPd6dMChNd4ZYfr9jU46GDocX8H00FdWaKw0N";

$secretKey="sk_test_51LpHMLKvhdBQwwficzF5fedHcQAFUyfxzY97MR9lM1qpsbuZr9ZdmBtnFO5QM2LUzqWiv3JYhsxQYQXyDVa5qvED009VuQ4i8f";

\Stripe\Stripe::setApiKey($secretKey);
?>