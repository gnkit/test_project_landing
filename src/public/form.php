<?php
session_start();

if (!isset($_SESSION['order'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $test = $_POST['test'];

    try {
        $url = 'https://order.drcash.sh/v1/order/';
        $data = [
            'stream_code' => 'iu244',
            'client' => [
                'name' => $name,
                'phone' => $phone,
            ],
            'sub1' => $test,
        ];
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer NWJLZGEWOWETNTGZMS00MZK4LWFIZJUTNJVMOTG0NJQXOTI3',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);

        $_SESSION['order'] = true;

    } catch (Exception $error) {
        $_SESSION['order'] = false;
    }

    header('Location: /response.php');
}






