// Created by Nathan Collins, inspiration from this website
// https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/

// Create span elements to be used as custom tagged inputs
// similar to bootstraps tag Input, for more info check out the link
const taggedInputCreator = (text) => {
    // create basic tag structure
    let taggedText = document.createElement('span');
    taggedText.classList.add('custom-tags');
    taggedText.innerHTML = `${text.value.slice(0,text.value.length)}<i class="fa fa-times close" aria-hidden="true"></i>
    `;

    return taggedText;
}

// This adds tagged inputs to the list tagged items that have alread been tagged
// check out the bootstrap link for a similar example to want has been built here
function tagAdder(event) {
    // make sure that the tag has content
    const checkInput1 = document.querySelector('#add-ingredient-input');
    const checkInput2 = document.querySelector('#add-method-input');
    if (checkInput1.value.length > 1){
        if(event){
            checkInput1.nextElementSibling.insertAdjacentElement("beforeend",taggedInputCreator(checkInput1));
            // clear placeholder text and the content ready for the next tagged input to be entered
            checkInput1.placeholder = "";
            checkInput1.value = "";
        }
    }else if (checkInput2.value.length > 1){
        if(event){
            checkInput2.nextElementSibling.insertAdjacentElement("beforeend",taggedInputCreator(checkInput2));
            // clear placeholder text and the content ready for the next tagged input to be entered
            checkInput2.placeholder = "";
            checkInput2.value = "";
        }
    }
}

// When the close icon is clicked delete the tag
const tagDeleter = (event) => {
    if(event.target.classList.contains('close')){
        event.target.parentElement.parentElement.removeChild(event.target.parentElement);
    }
}

function modifyFormSubmission(event) {
    // Grab the tagged ingredients list and put it into an array then stringify
    // assign stringified list to hidden input value for submission to server
    function stringifier(tagSelector, inputSelector){
        const arrayOfTags = [];
        const hiddenInput = document.getElementById(inputSelector);
        const Tags = document.getElementById(tagSelector).querySelectorAll("span");
        for(tag of Tags){
            arrayOfTags.push(tag.innerText);
        }

        hiddenInput.value = JSON.stringify(arrayOfTags);

    }
    // Ingredient Stringifier
    stringifier('add-ingredient-div','add-ingredient-hidden');
    // Method Stringifer
    stringifier('add-method-div','add-method-hidden');

    // Finally submit form to server
    document.querySelector('form').submit();

}

// stop other buttons apart from the submit button from triggering a form submission
function BtnDefaultChanger(event) {
    event.preventDefault();
}

// Image Upload Functionality
function imageUpload(event) {
}

// Form Validation

function formValidation(event) {
    let imageUpload = document.querySelector('#imageUpload');
    console.log(event);
}



/**************** EVENT LISTENERS **************/

// listen for Add button click
document.querySelector('#ingredient-add-btn').addEventListener('click', tagAdder);
document.querySelector('#method-add-btn').addEventListener('click', tagAdder);

// listen for mouse click
document.querySelector("#add-ingredient-div").addEventListener('click', tagDeleter);
document.querySelector("#add-method-div").addEventListener('click', tagDeleter);

// Modify default form submission
document.querySelector("#new-recipe-form-button").addEventListener('click', modifyFormSubmission);

// Disable default button behaviour
document.querySelector('#ingredient-add-btn').addEventListener('click', BtnDefaultChanger);
document.querySelector('#method-add-btn').addEventListener('click', BtnDefaultChanger);

// Form Validaiton
document.querySelector('form').addEventListener('submit', formValidation);
