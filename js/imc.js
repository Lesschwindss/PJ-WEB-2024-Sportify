function calculateIMC() {
    var weight = document.getElementById('weight').value;
    var height = document.getElementById('height').value;
    var resultText = '';
    
    if (weight > 0 && height > 0) {
        var imc = (weight / ((height / 100) ** 2)).toFixed(2);
        resultText = 'Votre IMC est ' + imc + '. ';
        
        if (imc < 18.5) {
            resultText += 'Vous êtes en insuffisance pondérale.';
        } else if (imc >= 18.5 && imc < 24.9) {
            resultText += 'Vous avez un poids normal.';
        } else if (imc >= 25 && imc < 29.9) {
            resultText += 'Vous êtes en surpoids.';
        } else if (imc >= 30 && imc < 39.9) {
            resultText += 'Vous êtes en obésité.';
        } else {
            resultText += 'Vous êtes waleed.';
        }
    } else {
        resultText = 'Veuillez entrer des valeurs valides.';
    }

    document.getElementById('imc-result').innerHTML = resultText;
}
