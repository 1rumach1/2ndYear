<?PHP

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $num1 = htmlspecialchars($_POST["num1"]);
    $num2 = htmlspecialchars($_POST["num2"]);
    $answer = "";    
    $operation = $_POST["operation"];
    switch ($operation) {
        case "+":
            $answer = $num1 + $num2;
            break;
        case "-":
            $answer = $num1 - $num2;
            break;
        case "x":
            $answer = $num1 * $num2;
            break;
        case "÷":
            if ($num2 == 0) {
                $answer = "denominatorError";
            } else {
                $answer = $num1 / $num2;
            }
            break;
    }
}
?>

<html>
    <head>
        <style>
            body{
                background-image: linear-gradient(#ff8a00, #e52e71);
            }
            input[type=number]{
                width: 100px;
            }
        </style>
        <title>
            Register Page
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" style="width: 500px;">
            <div class="bg-opacity-50 border border-2 container container-sm m-4 p-4 rounded bg-dark text-center" style="height: 500px;">
                <div class="opacity-100 text-white">
                    <div class="col m-2 p-2" style="font-size: 30px;">
                        <b>CALCULATOR</b>
                    </div>
                    <div class="col m-2 p-5" style="height: 200px;">
                        <form method="post" action="<?PHP echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" class="row">
                            <div class="col md-3">
                                <input type="number" name="num1" required class="form-control rounded border border-0" value="<?PHP echo htmlspecialchars($num1) ?>">
                            </div>
                            <div class="col md-3">
                                <select name="operation" style="width: 40px;" class="form-control rounded ms-2">
                                    <option value="+">+</option>
                                    <option value="-">-</option>
                                    <option value="x">x</option>
                                    <option value="÷">÷</option>
                                </select>
                            </div>
                            <div class="col md-3">
                                <input type="number" name="num2" required class="form-control rounded border border-0" value="<?PHP echo htmlspecialchars($num2) ?>"><br>
                            </div>
                            <div class="col md-3">
                                <input type="submit" class="form-control rounded border border-0" value="Calculate">
                            </div>
                        </form>
                    </div>
                    <div class="col m-2">
                        Answer: <br>
                    </div>
                    <div style="height: 40px;" class="border rounded col m-2 text-white">
                        <?PHP
                            if(isset($answer)){
                                if($answer == "denominatorError"){
                                    echo "Denominator can not be <font color=#8B0000>Zero</font>.";
                                }else{
                                    echo "$num1 $operation $num2 = $answer";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>