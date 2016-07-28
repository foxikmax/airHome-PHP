<?php
include 'include/config.php';
include 'include/classes/autoloader.class.php';
spl_autoload_register(array('Autoloader', 'loadPackages'));
include 'include/vendor/autoload.php';

$commands = array(  'poweron' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000e2ee000037276a00ed814431cc0d43b40100000092c40000cf363b76b80b3efff549075883d60a5722280c2c348eef7110f304159653e7f3a8a6e9d33a18d49de0027e9097eb0a65f796fcf6b2f879f8d229847891a50c850b09059aa6510a8e27aca72bb1925154',
                    'poweroff' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000032ed000037276a0014834431cc0d43b40100000070c40000c082c0e6ae7ece251ada744ec3f288ca04692c401b89ea62815a50d26004521e17bca9a9fc0f24ab52af30d3a66b87577e8f10f57eec6f21a7df8f38f7441040d583c39e3a3d8c3dda171c28644d8e0d',
                    'quickCooling' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000def1000037276a0098834431cc0d43b4010000004fc40000afd49f01f74c1fd06bc4be1db37368058bed1fe0066d7d87fee3c69f5f56151c08a66d25f8dda68a5ff4afb38002ddf6082d1f9ef7cb9732bbc02671426d6d02c04f5fd1bb54ea18e91dceaaaa96e9f8',
                    'curtainControlOff' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000cfef000037276a001e814431cc0d43b4010000000cc400005ccc61ffa821c665515829f17d064d0cd7c95637e28f4018d7abf2448a424c82e5fa016fe38bcd82fe8100aa6011d1c2fc514179c5f705b71d6dc50aca32eb4811be77304329f02bd392cb4d25a8dae3',
                    'curtainControlOn' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000e7ef000037276a0034834431cc0d43b4010000000cc400005ccc61ffa821c665515829f17d064d0cd7c95637e28f4018d7abf2448a424c82e5fa016fe38bcd82fe8100aa6011d1c2fc514179c5f705b71d6dc50aca32eb4811be77304329f02bd392cb4d25a8dae3',
                    'taimer1h' => '5aa5aa555aa5aa550000000000000000000000000000000000000000000000009ced000037276a00ac824431cc0d43b401000000d4c400008af611669a743a436a3f1eaec00fe1d4cdac727767969a4a414476dc58d42e1e7d40485329e7e341bd979bbd8783716eb240a27e129cae207ed70ae6d5da33314899450b86c7339a0e224875395ef941',
                    'taimer2h' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000026ed000037276a009b834431cc0d43b401000000d4c40000f2ca7966522d8268047ef714d504537aa3c9d5e55a65b2980765694d73c0233b96579a453443cc74f48381a4ce7553a453932b34295d69126f35ae2d050d92351a1fd026a6d689195bbfd5dab4fad60d',
                    'taimer3h' => '5aa5aa555aa5aa550000000000000000000000000000000000000000000000000bf0000037276a003b814431cc0d43b401000000d4c400008b6c5cb5670b0fdaf115c8e484e17a9a599980f3dca4f75fc26337c7d1f440fdd1a9464792cd4cdc0a11e3982c35ce07a36321de9d4ccf0a05dc4556fd2256722c9d585a279cecc0303019ab86620d89',
                    'taimer4h' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000000f1000037276a008f824431cc0d43b401000000d4c4000078f9e0ae883a041a234946ab5af21faf0110b47acd778152dda122eb4870844e4eb68979dc5eb0678ed41c632f9a5b4720a34ced2ae5a1d65a96207aa41d91dd5ce49d8cfb1a86a05c2bf28aeff4e590',
                    'taimer5h' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000039f4000037276a0091824431cc0d43b401000000d5c4000041d459f6a3cdb6ca31c5766826ba809bd25e58f6fd290b94c4fd1c9aa8830d8bd8a1a7bf98aded327f98e66c1a09dc76992f6a1ee0bb296ff610f039b1b8cbd6c3e62b35e9332873f2a6eeba7e1419ac',
                    'taimerOff' => '5aa5aa555aa5aa550000000000000000000000000000000000000000000000001aea000037276a001e804431cc0d43b4010000004bc40000ca1b207326df59fc9c534107dd00345922a403ff00c1e918060001898e907d2cb2f23ac5e3aec0fcbccd3c84265c356559743a0dba647ebf154e522fc58161b421512411580dc121dca7b378519ca52f',
                    'temp18' => array(  'speedSlow' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000087ea000037276a006f824431cc0d43b40100000092c40000f3208ad1576628996acaaa237e5813f6384d15020d8dac3dfd667153e5bb24b7ebaf661b6f7b797251f40f53f14015d7abb45d6057093c89828353332e16bd02654632b76d0d85a4a646ad5c01826a5e',
                                        'speedAverage' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000078f4000037276a00eb824431cc0d43b401000000b4c4000036e6ec57e1014d1846348b87fc33b5d2c921c2f7baa940d640ce54a369ec72d7b5e71b1af44385ac50f260a1b2688988fd89277be4d120c4869e2583f668b3cfe6c34b0f2a02f17f756d3e1fa5e9dbd8',
                                        'speedFast' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000dbef000037276a00d8814431cc0d43b401000000d4c400009dff46d3cc2ab2ec3c8262e259bf88ee1f605ad7378303685ba93ec2dd32949d17004a9d20883339ce606e96a9b680866c53907a3f5e8461b59e4bee1e9e5da04fffd988cc602f31455bb377cfd85901'),
                    'temp19' => array(  'speedSlow' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000fbf3000037276a001c804431cc0d43b4010000004fc400003736069ada81d64ad7c6623f8994a8e291ad21ab2b9feb58d3fc7a9c02e486e3a609a43dda026af4f071947aa69e9ec98bf105a6e0a3d6e993c79e6481c7059d7b150420934997f0f5bceeadd94d952a',
                                        'speedAverage' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000c6ed000037276a00de834431cc0d43b40100000093c400001e5178a61a6757dee7e2ce63c3abbf61be9a43b8a14e9369810c2b3698d2334d0e4d759fea1b9414518737209c4da30442a809d8dc944251496050573a746bb7ead039c5695f8b108f7af6294980e4bb',
                                        'speedFast' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000056f1000037276a000f804431cc0d43b4010000002cc4000061fdbcca12105d9cd548d70bef08a44aa153bb4efecb8c132c287493edae684a32eb951c39e1d6e3d0e6c63ff8f3f07a1893acc56f9d7b2786a3bcd389d8cfb12b8303151402dc7713e48d2155fed41f'),
                    'temp20' => array(  'speedSlow' => '5aa5aa555aa5aa550000000000000000000000000000000000000000000000004ef5000037276a00db824431cc0d43b40100000091c400001cd62b3db7a3cd529470b567f884f5a828fd906a729e85b837a4c564f293e138a7a8158bba7deae8c47ec61c898554a0a0ddedf3772bdb3c3bf25d6cbaf76da53941c1a871beae3dcd039d8c8a51d338',
                                        'speedAverage' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000abf0000037276a00a2814431cc0d43b401000000d6c4000086fefd156fdd1e0bce5b6bd7029e99fa8f0183e4a285a3c4393fa88ae5e613a92cb1b649510e22fefe0b840e94d8507a7f4425528682ee814e5c6a7155b8fd5c5608fe22139eedb733d122e0b65266c7',
                                        'speedFast' => '5aa5aa555aa5aa550000000000000000000000000000000000000000000000004fee000037276a0004824431cc0d43b40100000071c400007580dd9135b1b3bc0264e1b586dfe3d710ca1a3a52b18f9315bcd49ce7722401e78463405b6b37778c693f23e25e6c371e87fe6852e7c2c0440d5e461214bf7cf80f7434ab36faba594592d67a3830f2'),
                    'temp21' => array(  'speedSlow' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000046f0000037276a00d2804431cc0d43b40100000092c400003b11b58e4e2300e8d1b6231120824fc3a3312fb3748b901e6cf276018852e2e14a2bf46fb8837222ea7f85b29d5fa3b54dcbb7cb333b1323ff0e80b9d1bc0cacf4af327778d6e19c7cedcf053552acce',
                                        'speedAverage' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000014f1000037276a00b7824431cc0d43b40100000050c400001cd62b3db7a3cd529470b567f884f5a8803fa1b5888bd541942b3ddda6718e652e01b972275e8af0f08c0378e0873b50310cfae9ec8106616bc42de0de5278ab6c77f5a6922f400b549d6ac55259edda',
                                        'speedFast' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000093ec000037276a000d804431cc0d43b40100000070c4000010282b5767b3cccc2a971a3c3cd72d805606511541e47a546521386919e70525b67213ffbdd27a4f1fa0feae5d6ccbad7c7d13e5981a87eaf978fb30f8330a9b66d6c19b6c8ad1a3915d80ab34892119'),
                    'temp22' => array(  'speedSlow' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000b8ea000037276a0059824431cc0d43b401000000d6c40000fff7b8ac3ad0067f0923805a113308b2519288614e59a7d1ee2286f53eac09088ba4d41571f3d977628b7c4443c44f03268c1603a76e5038814f01355587ea70bf29451c4014ac58378db1f07f3ace29',
                                        'speedAverage' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000a0f2000037276a003c834431cc0d43b40100000092c40000f242b4add992dd558a880040c850fb42a831d188cfa3b642c5704bd5cb6d0b065bf06474cd1794783b23029ebbfd6cd8f795176871295527c2e9fccba70e37eb8d7a6e760675feb9999c8ef2dc0c95f9',
                                        'speedFast' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000029f8000037276a00cf814431cc0d43b401000000b3c40000b4a0294b816fab45f6f1fcc5ece7910dc08a6d1584e378def07d647d63169ae957b9d7f58517aa9cff9ed675eed83b5e9faff67c76ee0db6fd20fb54d4b882d576ef0fe5f7cc66dfa10841c70bac17fa'),
                    'temp23' => array(  'speedSlow' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000f9eb000037276a001b814431cc0d43b4010000000bc4000000cc6e526e5b152fdf3f4bbb125ad9411d776069707ceb5293102c5f57a7bf7bda16a74fe2cce0b9416299dc93890a28a4f0132c3875ca469431534fe146cb6a91a419cd83bb932bd5095b5ccd3374a0',
                                        'speedAverage' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000077eb000037276a00d2804431cc0d43b4010000004dc40000e99ed4dd5b3a3cfa1942ede1923e376ab486178f0fbf6a36b4aa7718fe2c220a899803669d1e18dfe8694719759a1a1e2c6ca14ac8a8fd581b3008ae097de7515abf232c8a9140b35e8ec0f9487d040e',
                                        'speedFast' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000054f3000037276a002c814431cc0d43b4010000004fc4000041d459f6a3cdb6ca31c5766826ba809baffe9470e612d8f2b1613f670c8313c3bf53f80bbc5a5229dd99d7c0fe4b41c77f5b725275d00e43a695fc53389f403bd166cac961e571ba29f7cd8cba4c97c3'),
                    'temp24' => array(  'speedSlow' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000034f1000037276a003a824431cc0d43b4010000004fc400005ccc61ffa821c665515829f17d064d0c054be0eb6c12b7838f83543c48d6f99071b2e753d1b42528f93a5e31aa8f385cf74a308384de50c609a69dcad48de300c422cf3de0b282cac8a89ee0a7ed8718',
                                        'speedAverage' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000d1ee000037276a006b814431cc0d43b40100000093c400001e5178a61a6757dee7e2ce63c3abbf616e0d33ba8b9c8895b636e25a8adc310268ef924a443d97309036a1fb8d7111b8fbfe3bb5c225784b1e1012aff9980385b637b14a6a952b744b329159abba5fad',
                                        'speedFast' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000061f1000037276a00df824431cc0d43b40100000092c40000cf363b76b80b3efff549075883d60a577ef8f604f5c156c5078ec8c1ae547f00afbacc41fce90ce5004fb29400cb51a1672085c8017c436e4d48eb2394049d31f45a6a91bcc130fc7db2c671ec73f5af'),
                    'temp25' => array(  'speedSlow' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000a2ef000037276a0018814431cc0d43b4010000004fc4000086fefd156fdd1e0bce5b6bd7029e99fa627408956b7c540b69ae0064b5e21f8870239f12cee156e4648b98fa2c5cc797d433a04bfc6dc77baa829d564d95f74669a81e61d3610d35cf61cf55c389f01d',
                                        'speedAverage' => '5aa5aa555aa5aa5500000000000000000000000000000000000000000000000028ec000037276a005f824431cc0d43b40100000072c40000fff7b8ac3ad0067f0923805a113308b23268413800abfa09b3810eb1d8f6d15f180d4ded805b4129cd189f280e177970ed4642a5e48c36f5d00985ce41ccbe2ef47213da4ee49e348e06fb0e2e8a28ad',
                                        'speedFast' => '5aa5aa555aa5aa55000000000000000000000000000000000000000000000000dbee000037276a00af804431cc0d43b40100000092c400000437106285f96a9519f9d6e55ce578846cbe2ef13bddefc7252b3c27785139f424908f71c8d53279e94976ea5b1f0c6c518f5ceae05fc664a3a41e3f457e2911ca3b5399d6176b27c6b7987b31e3588d'),
                    );




if(filter_input(INPUT_POST, 'action')) {
    $postAction = filter_input(INPUT_POST, 'action');

    if ($postAction === "command") {
        $cmd = trim($_POST['cmd']);
        $speed = config::getParam('config.ini', 'speed');
        $temp = 'temp'.config::getParam('config.ini', 'temp');

        if (preg_match("/^temp[\d]{2}$/", $cmd) && isset($commands[$cmd][$speed])) {
            $status = execCmd($commands[$cmd][$speed]);
        }
        elseif (($cmd === 'speedSlow' || $cmd === 'speedAverage' || $cmd === 'speedFast') && isset($commands[$temp][$cmd])) {
            $status = execCmd($commands[$temp][$cmd]);
        }
        elseif(isset($commands[$cmd])){
            $status = execCmd($commands[$cmd]);

            if($cmd === 'taimerOff'){
                sleep(2);
                execCmd($commands[$temp][$speed]);
            }
            elseif($cmd === 'poweron'){
                sleep(5);
                execCmd($commands['temp18']['speedSlow']);
            }
        }
        else{
            die(json_encode(array("error" => true, "msg" => "Команда не определена")));
        }

        if($status !== true){
            die(json_encode(array("error" => true, "msg" => "Не удалось передать команду")));
        }

        changeStatus($cmd);

        $return = array("error" => false, "msg" => "Команда передана", "cmd" => $cmd);
        die(json_encode($return));
    }

    if ($postAction === "scheduleSave") {
        $speed = trim($_POST['speed']);
        $temp = trim($_POST['temp']);
        $time = trim($_POST['time']);

        if(isset($commands[$temp][$speed]) === false){
            die(json_encode(array("error" => true, "msg" => "Команда не определена")));
        }

        $filename = 'config.ini';
        $sheduleStatus = 0;

        config::changeConfig($filename, 'sheduleSpeed', $speed);
        config::changeConfig($filename, 'sheduleTemp', $temp);

        $times = json_decode($time, true);
        foreach ($times as $key => $value) {
            config::changeConfig($filename, 'sheduleTime'.$key, $value);
            if($value == 1){
                $sheduleStatus = 1;
            }
        }

        config::changeConfig($filename, 'sheduleStatus', $sheduleStatus);

        $return = array("error" => false, "msg" => "Расписание изменено", "cmd" => $cmd);
        die(json_encode($return));
    }

}


function execCmd($command){
    $ip = config::getParam('config.ini', 'ip');
    $port = config::getParam('config.ini', 'port');

    $out= hextobin($command);
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    socket_sendto($sock, $out, strlen($out), 0, $ip, $port);
    socket_close($sock);
    return true;
}

function changeStatus($cmd){
    $filename = 'config.ini';

    if($cmd === 'poweron'){
        config::changeConfig($filename, 'status', 'Включен');
        config::changeConfig($filename, 'temp', '18');
        config::changeConfig($filename, 'speed', 'speedSlow');
        config::changeConfig($filename, 'timer', '0');
        config::changeConfig($filename, 'curtain', 'off');
    }
    elseif($cmd === 'poweroff'){
        config::changeConfig($filename, 'status', 'Выключен');
        config::changeConfig($filename, 'timer', '0');
        config::changeConfig($filename, 'curtain', 'off');
    }
    elseif($cmd === 'quickCooling'){
        config::changeConfig($filename, 'temp', '18');
        config::changeConfig($filename, 'speed', 'Быстро');
    }
    elseif($cmd === 'taimer1h'){
        config::changeConfig($filename, 'timer', '1');
    }
    elseif($cmd === 'taimer2h'){
        config::changeConfig($filename, 'timer', '2');
    }
    elseif($cmd === 'taimer3h'){
        config::changeConfig($filename, 'timer', '3');
    }
    elseif($cmd === 'taimer4h'){
        config::changeConfig($filename, 'timer', '4');
    }
    elseif($cmd === 'taimer5h'){
        config::changeConfig($filename, 'timer', '5');
    }
    elseif($cmd === 'taimerOff'){
        config::changeConfig($filename, 'timer', '0');
    }
    elseif($cmd === 'speedSlow'){
        config::changeConfig($filename, 'speed', 'speedSlow');
    }
    elseif($cmd === 'speedAverage'){
        config::changeConfig($filename, 'speed', 'speedAverage');
    }
    elseif($cmd === 'speedFast'){
        config::changeConfig($filename, 'speed', 'speedFast');
    }
    elseif($cmd === 'temp18'){
        config::changeConfig($filename, 'temp', '18');
    }
    elseif($cmd === 'temp19'){
        config::changeConfig($filename, 'temp', '19');
    }
    elseif($cmd === 'temp20'){
        config::changeConfig($filename, 'temp', '20');
    }
    elseif($cmd === 'temp21'){
        config::changeConfig($filename, 'temp', '21');
    }
    elseif($cmd === 'temp22'){
        config::changeConfig($filename, 'temp', '22');
    }
    elseif($cmd === 'temp23'){
        config::changeConfig($filename, 'temp', '23');
    }
    elseif($cmd === 'temp24'){
        config::changeConfig($filename, 'temp', '24');
    }
    elseif($cmd === 'temp25'){
        config::changeConfig($filename, 'temp', '25');
    }
    elseif($cmd === 'curtainControlOn'){
        config::changeConfig($filename, 'curtain', 'on');
    }
    elseif($cmd === 'curtainControlOff'){
        config::changeConfig($filename, 'curtain', 'off');
    }
    return true;
}

function hextobin($hexstr) {
    $n = strlen($hexstr);
    $sbin="";
    $i=0;
    while($i<$n) {
        $a =substr($hexstr,$i,2);
        $c = pack("H*",$a);
        if ($i==0){$sbin=$c;}
        else {$sbin.=$c;}
        $i+=2;
    }
    return $sbin;
}
