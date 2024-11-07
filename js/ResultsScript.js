document.addEventListener("DOMContentLoaded", function() {
    console.log("loaded");
    displayInfo();
});

function displayInfo() {
    console.log("in");
    var bmiValueElement = document.querySelector("#bmiValueElement");
    var bmiStatusElement = document.querySelector("#bmiStatusElement");
    var bmiStatusMessage = document.querySelector("#bmiStatusMessage");
    var calorieInformation = document.querySelector("#calorieInformation");
    var nutritionalDescription = document.querySelector("#nutritionDescription");
    var theGoalForWhatToEat = document.querySelector("#theGoalForWhatToEat");
    var whatToEat = document.querySelector("#whatToEat");


    console.log(bmiValueElement, bmiStatusElement, bmiStatusMessage); 

    var userInfo = JSON.parse(localStorage.getItem('userInfo'));

    if (userInfo) { 
        var bmi = userInfo.bmi;
        
        if (bmi < 18.5) {
            bmiStatusElement.innerHTML += "<b>Underweight</b>";
            bmiStatusMessage.innerHTML+="This means that, for your height, you carry less weight than is considered healthy <br> this may indicate that your body isn't getting enough nutrients to maintain normal body functions. This can happen if you’re not eating enough, burning more calories than you consume, or if underlying health conditions affect your weight. Being underweight can weaken your immune system, reduce muscle strength, and increase the risk of issues like osteoporosis, anemia, or fatigue"
            calorieInformation.innerHTML+="You must go on a <b> Calorie Surplus <b>"
            calorieInformation.innerHTML += "You must go on a <b>Calorie Surplus</b> to gain weight healthily.";
            nutritionalDescription.innerHTML=" You need to consume more calories than your body burns in a day.  This extra intake of energy is essential for people looking to gain weight, build muscle, or recover from being underweight.  This should come from a balanced diet rich in protein, healthy fats, and complex carbohydrates, helping you gain weight in a healthy and controlled manner.<b> Creating a calorie surplus means: </b> <ul> <li>Eating more frequent meals and snacks throughout the day.</li><li>Prioritizing nutrient-dense foods that provide vitamins and minerals in addition to calories.</li><li> Increasing portions of your meals gradually to avoid digestive discomfort.</li></ul> "
            theGoalForWhatToEat.innerHTML="100-400 calories daily above your maintenance intake";
            whatToEat.innerHTML="<ul><li><b>Proteins:</b> Include lean meats (chicken, turkey), fatty fish (salmon, mackerel), eggs, tofu, legumes, and protein shakes to support muscle growth.</li><li><b>Healthy Fats:</b> Focus on avocados, nuts, seeds, olive oil, and nut butters for calorie-dense fats that promote healthy weight gain.</li><li><b>Carbohydrates:</b> Choose whole grains like oats, quinoa, brown rice, sweet potatoes, and whole wheat bread for sustained energy and extra calories.</li><li><b>Dairy Products:</b> Full-fat milk, yogurt, cheese, and cottage cheese can help increase calorie intake while providing essential nutrients like calcium and protein.</li><li><b>Fruits and Vegetables:</b> Opt for higher-calorie fruits like bananas, mangoes, and dried fruits (raisins, dates) and include starchy vegetables like potatoes, corn, and peas.</li></ul>"
        } else if (bmi >= 18.5 && bmi <= 24.9) {
            calorieInformation.innerHTML += "You are at a <b>Healthy Weight</b>. Keep maintaining your current intake.";

            bmiStatusElement.innerHTML += "<b>Normal</b>";
            nutritionalDescription.innerHTML = `
You are at a healthy weight for your height. To maintain this weight, it’s important to balance your calorie intake with your activity levels. Focus on a diet rich in all the essential nutrients to sustain overall health and energy levels. Your goal is to continue eating a balanced diet that supports your current weight and lifestyle.
<b>Maintaining your current weight means:</b> 
<ul> 
    <li>Eating a variety of nutrient-dense foods from all the major food groups.</li>
    <li>Keeping meals balanced with a mix of protein, healthy fats, and complex carbohydrates.</li>
    <li>Engaging in regular physical activity to maintain energy balance and overall fitness.</li>
</ul>
`;
theGoalForWhatToEat.innerHTML = "Maintain your daily calorie intake at your maintenance level";

whatToEat.innerHTML = `
<ul>
    <li><b>Proteins:</b> Incorporate lean meats, eggs, fish, legumes, and plant-based proteins to maintain muscle health.</li>
    <li><b>Healthy Fats:</b> Focus on healthy fat sources like nuts, seeds, olive oil, and avocado in moderation.</li>
    <li><b>Carbohydrates:</b> Continue eating complex carbs such as whole grains, sweet potatoes, and oats to fuel your body’s energy needs.</li>
    <li><b>Dairy Products:</b> Enjoy moderate portions of dairy products like yogurt, cheese, and milk for calcium and protein.</li>
    <li><b>Fruits and Vegetables:</b> Aim to eat a wide variety of fruits and vegetables to provide vitamins, minerals, and fiber for overall health.</li>
</ul>
`;
bmiStatusMessage.innerHTML += " This means that, for your height, your weight is generally in balance, contributing to better health outcomes. While BMI doesn't directly measure body fat, it serves as a useful indicator of a healthy weight relative to height. <br>  your body likely has a balance of muscle and fat that supports overall health. Maintaining this range is associated with a lower risk of chronic health conditions, such as heart disease, type 2 diabetes, and certain cancers."
        } else if (bmi >= 25 && bmi <= 29.9) {
            calorieInformation.innerHTML += "You should aim for a <b>Calorie Deficit</b> to promote weight loss.";

            bmiStatusElement.innerHTML += "<b>Overweight</b>";
            bmiStatusMessage.innerHTML+="This means that, for your height, you carry more weight than is considered healthy <br> your body stores excess fat, which can lead to health issues over time. This happens because the body is taking in more calories than it is using for energy. Excess fat can strain your organs, especially your heart, and increase the risk of conditions like heart disease, high blood pressure, type 2 diabetes, and joint problems."
            nutritionalDescription.innerHTML = `
You need to focus on balancing the calories you consume with the calories you burn. For someone who is overweight, the goal is to create a slight calorie deficit to gradually lose excess fat while maintaining muscle mass. This should come from a balanced diet rich in lean proteins, healthy fats, and fiber-rich carbohydrates, helping you achieve healthy weight loss in a controlled manner.
<b>Creating a calorie deficit means:</b> 
<ul> 
    <li>Reducing overall portion sizes and avoiding high-calorie, low-nutrient foods.</li>
    <li>Eating more nutrient-dense, whole foods that help you feel full for longer.</li>
    <li>Prioritizing physical activity alongside a balanced diet to burn additional calories.</li>
</ul>
`;

theGoalForWhatToEat.innerHTML = "200-500 calories daily below your maintenance intake";
whatToEat.innerHTML = `
<ul>
    <li><b>Proteins:</b> Include lean sources like chicken, turkey, fish, tofu, and legumes to support muscle retention.</li>
    <li><b>Healthy Fats:</b> Focus on moderate amounts of olive oil, nuts, seeds, and avocado for essential fats without over-consuming calories.</li>
    <li><b>Carbohydrates:</b> Opt for complex carbs like quinoa, oats, sweet potatoes, and whole grains, but keep portions controlled to support weight loss.</li>
    <li><b>Dairy Products:</b> Choose low-fat or fat-free options of milk, yogurt, and cheese to reduce calorie intake while maintaining important nutrients.</li>
    <li><b>Fruits and Vegetables:</b> Prioritize high-fiber vegetables (broccoli, spinach, cucumbers) and low-calorie fruits (berries, apples, oranges) to help with satiety and calorie control.</li>
</ul>
`;

        } else if (bmi > 30) {
            bmiStatusElement.innerHTML += "<b>Obese</b>";
            calorieInformation.innerHTML += "You need a <b>Calorie Deficit</b> to reduce weight and improve health.";

            nutritionalDescription.innerHTML = `
If you are obese, it’s essential to adopt a calorie deficit to promote sustainable and gradual weight loss. Focus on reducing calorie intake while still providing your body with the necessary nutrients it needs for proper functioning. The goal is to improve your overall health by lowering body fat and maintaining muscle mass through proper nutrition and regular physical activity.
<b>Creating a calorie deficit means:</b> 
<ul> 
    <li>Reducing portion sizes and cutting out high-calorie, processed foods.</li>
    <li>Eating more whole, nutrient-dense foods that provide energy and promote satiety.</li>
    <li>Incorporating regular exercise to help burn more calories and support weight loss.</li>
</ul>
`;
theGoalForWhatToEat.innerHTML = "500-1000 calories daily below your maintenance intake";
whatToEat.innerHTML = `
<ul>
    <li><b>Proteins:</b> Choose lean meats, fish, tofu, and legumes to provide protein while minimizing excess calories.</li>
    <li><b>Healthy Fats:</b> Limit intake of fats, but include sources like olive oil, nuts, and seeds in moderation for essential fatty acids.</li>
    <li><b>Carbohydrates:</b> Opt for high-fiber, low-calorie carbs such as leafy greens, whole grains, and non-starchy vegetables.</li>
    <li><b>Dairy Products:</b> Use low-fat or fat-free dairy products such as yogurt and milk to reduce calorie consumption while meeting calcium needs.</li>
    <li><b>Fruits and Vegetables:</b> Focus on non-starchy vegetables like broccoli, spinach, and bell peppers, and lower-calorie fruits like berries, apples, and grapefruit to help control hunger.</li>
</ul>
`;
         
         
         
         
         
         
            bmiStatusMessage.innerHTML += " This means that, for your height, you carry significantly more weight than is considered healthy <br> When you're obese, this extra weight can have a serious impact on your health. Excess fat strains your organs, especially your heart, and increases the risk of developing a range of conditions, including heart disease, high blood pressure, type 2 diabetes, sleep apnea, and joint problems";
        }

        bmiValueElement.innerHTML = `Your BMI: <b>${bmi} kg/m2</b>`;
    } else {
        console.error("No user info found in localStorage.");
    }
}