function calcArea(){
    var result = 0;
    var areaA = document.getElementById('areaA').value;
    var unitA = document.getElementById('unitA').options[document.getElementById('unitA').selectedIndex].value;
    result = parseFloat(areaA)||0;
    result *= parseFloat(unitA)||0; 
    document.getElementById('resultA').innerHTML = result.toFixed(1);
}
function calcUnit(){
    var result = 0;
    var areaU = document.getElementById('areaU').value;
    var unitU = document.getElementById('unitU').options[document.getElementById('unitU').selectedIndex].value;
        result = parseFloat(areaU)||0;
        result /= parseFloat(unitU)||0; 
        document.getElementById('resultU').innerHTML = result.toFixed(1);
}