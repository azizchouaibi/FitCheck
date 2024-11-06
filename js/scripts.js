/*!
* Start Bootstrap - Personal v1.0.1 (https://startbootstrap.com/template-overviews/personal)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-personal/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

document.addEventListener("DOMContentLoaded", function () {
        document.querySelector("#weight").addEventListener("input", validateWeight);
        document.querySelector("#height").addEventListener("input", validateHeight);
        document.querySelector("#age").addEventListener("input", validateAge);
    });

     var ValidInputs = {
                weight:false,
                height : false,
                age:false
     }

    function validateWeight() {
        var weightInput = document.getElementById("weight");
        var weight = parseFloat(weightInput.value);
        
        if (weight > 0 && weight <= 300) {
            weightInput.classList.remove("is-invalid");
            weightInput.classList.add("is-valid");
            ValidInputs.weight=true;

        } else {
            weightInput.classList.remove("is-valid");
            weightInput.classList.add("is-invalid");
            ValidInputs.weight=false;


        }
        checkInputs();

    }

    function validateHeight() {
        var heightInput = document.getElementById("height");
        var height = parseFloat(heightInput.value);
    
        if (height >= 100 && height <= 250) {
            heightInput.classList.remove("is-invalid");
            heightInput.classList.add("is-valid");
            ValidInputs.height=true;


        } else {
            heightInput.classList.remove("is-valid");
            heightInput.classList.add("is-invalid");
            ValidInputs.height=false;

          

        }
        checkInputs();

    }
    function validateAge() {
        var ageInput = document.getElementById("age");
        var age = parseFloat(ageInput.value);
    
        if (age >= 10 && age <= 120) {
            ageInput.classList.remove("is-invalid");
            ageInput.classList.add("is-valid");
            ValidInputs.age=true;


        } else {
            ageInput.classList.remove("is-valid");
            ageInput.classList.add("is-invalid");
            ValidInputs.age=false;


        }
        checkInputs();

    }
    


var inputs = document.querySelectorAll('input');
var submitButton = document.querySelector('#submitButton');



function checkInputs() {
         if (ValidInputs.weight&&ValidInputs.height && ValidInputs.age) {
         submitButton.classList.remove('disabled');
         } else {
                submitButton.classList.add('disabled');          
         }
}




function calculateBMI() {
        var weight = parseFloat(document.querySelector("#weight").value);
        var height = parseFloat(document.querySelector("#height").value) / 100; 
        var age = parseFloat(document.querySelector("#age").value);
        var gender = document.querySelector("#gender").value;
        var experienceLvl = document.querySelector("#experience").value;
    
        var bmi= (weight / (height*height)).toFixed(2);
        var exGoal;
    if (bmi < 18.5) {
    exGoal = 'underweight';
    } else if (bmi >= 18.5 && bmi < 24.9) {
    exGoal = 'normal';
    } else if (bmi >= 25 && bmi < 29.9) {
    exGoal = 'overweight';
} else {
    exGoal = 'obese';
}

        var userInfo = {
                weight:weight,
                height: height,
                age : age,
                gender: gender,
                experienceLvl : experienceLvl,
                bmi : bmi,
                exGoal : exGoal

        };


        localStorage.setItem("userInfo",JSON.stringify(userInfo));
        console.log("Redirecting...");
       // postData(userInfo);
      /*  setTimeout(() => {
            window.location.assign("http://localhost:8080/FitCheck/results.php");
        }, 1000);*/
        

}


