
function goBack() {
    window.history.back();
}

function redirectToLogin() {
    window.location.href = "login.php";
}
const cropsData = {
    Kharif: [
        "Rice - तांदूळ (Tandul)",
        "Maize - मका (Maka)",
        "Sorghum - ज्वारी (Jwari)",
        "Pearl Millet - बाजरी (Bajri)",
        "Finger Millet - नाचणी (Nachani)",
        "Pigeon Pea - तूर (Tur)",
        "Black Gram - उडीद (Udid)",
        "Green Gram - मूग (Moong)",
        "Soybean - सोयाबीन (Soyabin)",
        "Groundnut - भुईमुग (Bhuimug)",
        "Sunflower - सूर्यफुल (Suryaphul)"
    ],
    Rabi: [
        "Wheat - गहू (Gahu)",
        "Barley - जौ (Jau)",
        "Gram - चना (Chana)",
        "Mustard - मोहरी (Mohri)",
        "Linseed - जवस (Javas)",
        "Peas - मटार (Matar)",
        "Chickpea - चना (Chana)",
        "Lentil - मसूर (Masur)",
        "Field Pea - वाटाणा (Vatana)",
        "Faba Bean - वाटाण (Vatan)",
        "Rapeseed - तूप (Toop)",
        "Safflower - केशर (Kesari)"
    ],
    Zaid: [
        "Cucumber - काकडी (Kakdi)",
        "Watermelon - कलंगडी (Kalingadi)",
        "Muskmelon - केसर (Kesar)",
        "Bottle Gourd - दुधी (Dudhi)",
        "Okra - भेंडी (Bhendi)",
        "Bitter Gourd - कारला (Karla)",
        "Sponge Gourd - गावर (Ghewar)",
        "Cowpea - वारी (Vari)",
        "Pointed Gourd - परवळ (Parval)",
        "Sweet Corn - स्वीट कॉर्न (Sweet Corn)",
        "Green Peas - हरभरा (Harbhara)"
    ]
};


$(document).ready(function() {
    $('#monoculture').change(function() {
        toggleCropSelection();
    });

    $('#multiculture').change(function() {
        toggleCropSelection();
    });

    $('#confirmSelection').click(function() {
        createSizeUnitsFields();
    });
});

function toggleCropSelection() {
    const farmingType = $('input[name="farming_type"]:checked').val();
    const cropNamesFieldset = $('#crop_names_fieldset');

    cropNamesFieldset.empty();

    if (farmingType === "Monoculture") {
        const selectedCropType = $('#season').val();
        if (selectedCropType in cropsData) {
            cropsData[selectedCropType].forEach(function(crop) {
                const input = $('<input type="radio">')
                    .attr('name', 'crop_name')
                    .attr('value', crop)
                    .attr('required', true);
                const label = $('<label>').text(crop);
                cropNamesFieldset.append(input).append(label).append('<br>');
                
            });
        }
    } else if (farmingType === "Multiculture") {
        const selectedCropType = $('#season').val();
        if (selectedCropType in cropsData) {
            cropsData[selectedCropType].forEach(function(crop) {
                const input = $('<input type="checkbox">')
                    .attr('name', 'crop_name[]')
                    .attr('value', crop);
                const label = $('<label>').text(crop);
                cropNamesFieldset.append(input).append(label).append('<br>');
            });
        }
    }
}

function createSizeUnitsFields() {
    const selectedCrops = $('input[name="crop_name"]:checked, input[name="crop_name[]"]:checked');
    const sizeUnitsFields = $('#sizeUnitsFields');
    sizeUnitsFields.empty();

    selectedCrops.each(function() {
        const cropName = $(this).val();
        const labelCrop = $('<label>').text(cropName + ':');
        const labelSize = $('<br><label>').text('Size:');
        const inputSize = $('<input type="text" name="size[]" required>');
        const labelUnits = $('<label>').text('Units:');
        const selectUnits = $('<select name="units[]" required>')
            .append($('<option value="Hectar">Hectar</option>'))
            .append($('<option value="Bigha">Bigha</option>'))
            .append($('<option value="Acre">Acre</option>'))
            .append($('<option value="Square Metres">Square Metres</option>'));

        sizeUnitsFields.append(labelCrop)
            .append(labelSize).append(inputSize)
            .append('<br>')
            .append(labelUnits).append(selectUnits)
            .append('<br>');
    });
}