<?php
  $result = $first_num = $second_num = $op = "";
  
  if(isset($_POST["operation"])){
    $first_num = $_POST["first_num"];
    $second_num = $_POST["second_num"];
    $op = $_POST["operation"];
  
    switch($op){
      case 'A':
          $result = "The sum is " . ($first_num + $second_num);
          break;
  
      case 'S':
          $result = "The difference is " . ($first_num - $second_num);
          break; 
        
      case 'M':
          $result = "The product is " . ($first_num * $second_num);
          break;
  
      case 'D':
          if ($second_num != 0) {
              $result = "The quotient is " . ($first_num / $second_num);
          } else {
              $result = "Cannot divide by zero.";
          }
          break;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP CALCULATOR</title>
    <style>
      body {
        background: linear-gradient(to bottom right, #ff69b4, #c71585, #8a2be2);
        min-height: 100vh;
        margin: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
      .calculator {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        border-radius: 10px;
        border: 1px solid #ccc;
        background-color: rgba(0, 0, 0, 0.7);
      }
      .result {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #ccc;
        background-color: rgba(0, 0, 0, 0.7);
      }
      h1{
        text-align: center;
      }
      .image-container {
        position: absolute;
        top: 150px;
        left: 300px;
      }
    </style>
</head>
  <body>
     <div class="image-container">
        <img src="senkuu.png" alt="Senkuu" style="width: 200px; height: 200px;">
    </div>

    <h1>PHP: Simple Calculator</h1>
    <div class="calculator">
       <!--Form -->
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="input-group mb-3">
             <span class="input-group-text" id="inputGroup-sizing-default">NUMBER 1</span>
             <input type="text" name="first_num" value="<?php echo $first_num; ?>" class="form-control" aria-label="first_num" aria-describedby="inputGroup-sizing-default" required>
          </div>
   
          <div class="input-group mb-3">
             <span class="input-group-text" id="inputGroup-sizing-default">NUMBER 2</span>
             <input type="text" name="second_num"  value="<?php echo $second_num; ?>" class="form-control" aria-label="second_num" aria-describedby="inputGroup-sizing-default" required>
          </div>
   
          <!--Operation Buttons -->
          <div class="row">
              <div class="col">
                 <button class="btn btn-primary w-100" type="submit" value="A" name="operation">+</button>
              </div>
              <div class="col">
                 <button class="btn btn-success w-100" type="submit" value="S" name="operation">-</button>
              </div>
              <div class="col">
                 <button class="btn btn-danger w-100" type="submit" value="M" name="operation">*</button>
              </div>
              <div class="col">
                 <button class="btn btn-warning w-100" type="submit" value="D" name="operation">/</button>   
              </div>
          </div> 
      </form> 
    </div><br>
     
    <!--Result -->
    <div class="result">
      <div class="input-group input-group-lg">
        <span class="input-group-text" id="inputGroup-sizing-lg">Result</span>
        <input type="text" class="form-control" value="<?php echo $result; ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly>
      </div>
      <br>
      <button style="float: right;" class="btn btn-danger w-50"  onclick="location.href='../menu/menu.html'">Menu</button>
    </div>

  </body>
</html>