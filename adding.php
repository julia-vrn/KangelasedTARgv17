<?php
  require("abifunktsioonid.php");
  global $yhendus;
  if(isSet($_REQUEST["save"])){
$fileTmpName = $_FILES['image']['tmp_name'];
    if ($fileTmpName != "") {
      $fileData = file_get_contents($fileTmpName);
     $kask=$yhendus->prepare(
       "INSERT INTO heroes(name, city, superhero, description, good, image) VALUES (?, ?, ?, ?, ?, 0x".bin2hex($fileData).")");
      } else {
        $kask=$yhendus->prepare(
       "INSERT INTO heroes(name, city, superhero, description, good, image) VALUES (?, ?, ?, ?, ?, 0xffd8ffe000104a46494600010200006400640000ffdb0084000604040405040605050609060506090b080606080b0c0a0a0b0a0a0c100c0c0c0c0c0c100c0e0f100f0e0c1313141413131c1b1b1b1c1f1f1f1f1f1f1f1f1f1f010707070d0c0d181010181a1511151a1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1f1fffc2001108012c012c03011100021101031101ffc4001b00010003010101010000000000000000000001050603040207ffda0008010100000000fdbc000000000000000000000000000000038f8fe3bfafec00000009ce50c44bdd6b75d000000056e3809e9a9b64000000acc9f3012d5db8000009c5d7801d371dc00000f9c0fc0013a2d0000001e3c4c001369ae000002a7270003dfb58000005365a00058ec800000afc6c001371ab8000007ce07e0009d1e820000015f8d80027d3b9000002bb1d0004daeba000001cb07f2004ec6c40000064aa400ebbbfb000001f391ad801df5dee0000005066c02c76400000078714017ba60000002703c406d7dc0000004e0fce037dd40000009c379009dffd8000000c478c06f3b80000014f96f90165a1b180000078a9ea784004bdf756bd000026b33fe0f90004beeeaffb00098a8a1f14000013f5717fea801f15141e5980000092dafbdc0a6cd7340000004961abee70c2fc8000000136dad85365a0000000076de99fcec000000007e83f4cdd0c000000006f3bb2d4d000000001b7f632354000000013b2b09c578000000001adb6ffc40014010100000000000000000000000000000000ffda00080102100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000fffc40014010100000000000000000000000000000000ffda00080103100000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000fffc400401000010203050406070507050000000000010203000411051221314106304051101322718191235052616272c13242a1b1d1141520243543e133708292b2ffda0008010100013f00ff0060290fcdcb302af3a94779873686cc464e5ff9613b4966a8e6a4f7886edbb2dca51f4a49d0d4436f32e0aa1c4a87b8f4d38c1d16bed0b978cbc91ba01214f6be10b52dc256b5152ce64c18f08244216b4aaf214411a8312f6e5a6ce0974ac5725e312bb548240996aef35a71af844bcdcbccb77d85858d6998efe2f480318da09b32f20a083471d37450e3439ee29844bcc3f2ee05b2b2858e597945916eb537e85ea3730061c954e503383971022deb51524ca50d53af741a1e432ac38fbce9abab52cfc46bb8062b8d6028821430231046622c1b60cd37fb3bc7f9840c15ed0fd60f1022dc992fda4e9ad529eca472a67bc65d71a712eb6abab41a8222466d3372adbe9cd428a03450cc710eac36d2dcf61255e421c55f5ad7ed289af79aef046ca4ce0f4b93976903ff005c45aef06acd7d5cc5dffb61190a6f2b846cd38536a2468a4284570a70fb4ebbb665df6d63f08faef6c2afef467be0fbb87da94932093a2578f8efb67d2556a354d013e5073e1ede64bb65ba0669215e0338d378046cbb4556815e884281f180441e19d683acb8d1c969293e221d6cb6e2db39a094f91a6f0548a46c9a521330ba8be48006b845387b79f719b31c5366eac900286809c60926a49a9de0ad22cf75d6a799536485150141a8e5031009f1e1f681b2bb2dd034293e462b86f046cec997e7c38a1d863b44fc5a477e7c3cdb45d9579b19a9040efa4292524a4e6303e1bcd22c1964316736a03b4e7694ae75ca2bc38fc63682cd54b4c97903d03b8d46875aef25d971f790ca054ac814f76b0cb41965b6464d8091e1c4690eb4d3cd96dd4de41cd262dcb3d9929a4a590436b15009ad0c1cf7328c17e65b601bb7cd2b16758f2b235526ae3b9170fd389af46d634abb2ee8180a83e396e467160b6176a3439027c84138c578ab6e5153367b8840aad345a47cba41a83439ebb9d9560aa69d78e4da680fcd078a1033ef89c149b787c67f3dcd8b2e862ce66e8a29c4df70f3278b19c61845a0293cf8f8cee0663bc44a0bb28ca792071b6b0a5a5303e2dc0fb43bc7e70cff00a28d05d1073e32d84ddb52607257d3703311673a9764587126a0a07871420d138ab01cce116b5bcd3082dcaa82df38150c427df0eb8e3ae29c70de5ab1528ebb819c59b6d4c48fa3a05b24d4a0e9dd1256dc8ccd0055c59fbaac23302988e7c253a291356bd9f2d5bee85286694768f8c4ded53c414cab6118e0b56351dd0fda33afd7ad794a49cd35c3ca01dd562f1ad477c49dbb68cb50073ac45714af1c3ddca2576a255cecbed965590a7681fd21998977d3799712e0d6e9ac5229c0540152689e6627b6824656a849eb9d1f75390f189db6e7e6ea952fab6cff006d180fd60915f7ea60ef87432f3acac2da5942d26a083ac496d43c8a226d3d68cbac4e0aef3a44acf4acd242a5dc0af8723e477a214a4a524a884a4664c4eed249b354b1fcc2f98c11e71396bcf4dd43ae511ec2701e3ce0e9c20842dc6d41685142864a181891da6996688994879bcaf0c1407d624ad3929c1565c17b32d9c143bc41fe3a4521d75969379d586d3cd4695f389cda7966ea99549757ed1c00f039c4e5a53936aabce123440c123b84562b04f0b53153014a06a09046a224b68e718012f7a76c73fb5e71276d59f34004b9717aa57853c758a7f8fe1116c5be259465e5a8a787da5e89ff0030fccbefaca9e595926b89c3ca2a20f14290230ad75891b6a7250d02fac6ce2a6d649f239c494eb3392e1e68e19293a83c8c50f4cf4c8969375ead0a45124fb472852d4a254ac4a8d4f79c4fa80651b3536599eea5468dbe287e6fbb1ee8d7a36a1d09904b67fb8a14ff008e318d3d4328ef5534cba726d415e500d403ed007ce35e8dac3d8954fc4a3f841f51346aca0fc29fcba76ad67ae653ec8af9c1cfd4567aafc932aafda408d6046d51a5a094e7e8d27ce0e5ea2b14955952cad6ed3f131af46d2b895da640c6ea4249f788afa8446cfb895d94d019a303e75e8c71e516e7f547fe6f51ecc7f4e34caffd2358ffc400141101000000000000000000000000000000a0ffda0008010201013f00349fffc400141101000000000000000000000000000000a0ffda0008010301013f00349fffd9)");
        }
    $kask->bind_param("ssisi", $_REQUEST["name"], $_REQUEST["city"], $_REQUEST["superhero"], $_REQUEST["description"], $_REQUEST["good"]);
    $kask->execute();
  }
?>

<!DOCTYPE HTML>
<html>
  <head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="addform.css">    
    <title>Add hero</title>
  </head>
  <body>
<form id="form" method="post" enctype="multipart/form-data">
    <legend><?= $data['page_title'] ?></legend>

    
    <div class="row">
      <h1> Hero add form </h1>
        <div class="form-group">
            <label for="name" class="cont">Hero name:</label>
            <input class="form-control" type="text" name='name' value="<?= $data['name'] ?>"
                   required>
            <span class="help-block"></span>
        </div>
        <div class="form-group">
            <label class="cont">City:</label>
            <input class="form-control" type="text" name='city' value="<?= $data['city'] ?>"
                   required>
            <span class="help-block"></span>
        </div>
        
        <div class="form-group">
            <label class="cont">Super abilities?:</label>
            <select name="superhero" class="form-control" id="superhero" required>
                 <option value="1">Yes</option>
                 <option value="0">No</option>
            </select>
        </div>
        
        
        <div class="form-group">
            <label class="cont">Description:</label>
            <textarea name="description" class="form-control" required></textarea>
            <span class="help-block"></span>
        </div>

      <div class="form-group">
            <label class="cont">Good or bad?:</label>
            <select name="good" class="form-control" id="good" required>
                 <option value="1">Good</option>
                 <option value="0">Bad</option>
            </select>
        </div>
      
        <div class=" form-group">
            <label class="cont">Load image:</label>
            <input class="form-control" type="file" name='image' id='image'>
            <span class="help-block"></span>
        </div>

    <div class="form-group">
        <a onclick="window.location.href = 'proov.php'" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-success" name="save" value="">Add hero!</button>
    </div>
    </div>   
</form>

</body>
</html>