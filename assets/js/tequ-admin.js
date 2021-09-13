//TEQU VARIABLES
let questionsContainer = document.querySelector('.tequ-admin__questions');
let categoriesContainer = document.querySelector('.tequ-admin__categories');
let questionRow = questionsContainer.querySelector('.tequ-admin__group-row');
let categoryRow = categoriesContainer.querySelector('.tequ-admin__group-row');
let tequAddQuestionButton = document.querySelector('#add-question');
let tequAddCategoryButton = document.querySelector('#add-category');
let textAreas = document.getElementsByTagName("textarea");
//TEQU FUNCTIONS
function tequAddGroup(target) {
    let groupRow;
    if (target.getAttribute('id') == 'add-question') {
        groupRow = questionRow.cloneNode(true);
        // groupRow = questionsContainer.querySelector('.tequ-admin__group-row')
    }
    else if (target.getAttribute('id') == 'add-category') {
        groupRow = categoryRow.cloneNode(true);
        let addImg = groupRow.querySelector('.tequ-admin__upload-img');
        let delImg = groupRow.querySelector('.tequ-admin__delete-image');
        let imgContainer = groupRow.querySelector('.tequ-admin__category-img-container');
        addImg.classList.remove('hidden');
        delImg.classList.add('hidden');
        imgContainer.innerHTML = '';
    }
    let groupRowInputs = groupRow.querySelectorAll('input, textarea');
    groupRowInputs.forEach(el => {
        el.value = '';
    })
    if (target.getAttribute('id') == 'add-question') {
        questionsContainer.appendChild(groupRow);
    }
    else if (target.getAttribute('id') == 'add-category') {
        categoriesContainer.appendChild(groupRow);
        textareaAutoresize();
        addDeleteImage();
    }
}

jQuery(function ($) {
    $(".tequ-admin__groups").sortable({ axis: 'y' });
    // jQuery(".tequ-admin__groups").disableSelection();
});
jQuery(function ($) {
    $("#tequ-tabs").tabs();
});

//event delegation for click event
// questionsContainer.forEach(el=>{
questionsContainer.addEventListener('click', function (e) {
    if (e.target.matches('.tequ-admin__delete-group')) {
        let questionRow = e.target.closest('.tequ-admin__group-row');
        let questions = document.querySelector('.tequ-admin__questions');
        questions.removeChild(questionRow);
    }
});
categoriesContainer.addEventListener('click', function (e) {
    if (e.target.matches('.tequ-admin__delete-group')) {
        let questionRow = e.target.closest('.tequ-admin__group-row');
        let categories = document.querySelector('.tequ-admin__categories');
        categories.removeChild(questionRow);
    }
});
// })

// add question group
tequAddQuestionButton.addEventListener('click', function (e) {
    e.preventDefault();
    tequAddGroup(e.target);
});

// add category group
tequAddCategoryButton.addEventListener('click', function (e) {
    e.preventDefault();
    tequAddGroup(e.target);
});

// textarea autoresize
function textareaAutoresize() {
    for (let i = 0; i < textAreas.length; i++) {
        textAreas[i].setAttribute("style", "height:" + (textAreas[i].scrollHeight) + "px;overflow-y:hidden;");
        textAreas[i].addEventListener("input", OnInput, false);
    }
}
textareaAutoresize();
function OnInput() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
}

// ADD MEDIA
function addDeleteImage() {
    jQuery(function ($) {

        // Set all variables to be used in scope
        let frame;
        let categoryBox = $('.tequ-admin__category-row');
        categoryBox.each(function (index) {
            let addImg = $(this).find('.tequ-admin__upload-img');
            let delImg = $(this).find('.tequ-admin__delete-image');
            let imgContainer = $(this).find('.tequ-admin__category-img-container');
            let imgInput = $(this).find('.tequ-admin__category-image-url');
            // ADD IMAGE LINK
            addImg.on('click', function (event) {
                event.preventDefault();

                // If the media frame already exists, reopen it.
                // if (frame) {
                //     frame.open();
                //     return;
                // }

                // Create a new media frame
                frame = wp.media({
                    // title: 'Select or Upload Media Of Your Chosen Persuasion',
                    // button: {
                    //     text: 'Use this media'
                    // },
                    multiple: false  // Set to true to allow multiple files to be selected
                });


                // When an image is selected in the media frame...
                frame.on('select', function () {

                    // Get media attachment details from the frame state
                    var attachment = frame.state().get('selection').first().toJSON();

                    // Send the attachment URL to our custom image input field.
                    imgContainer.append('<img src="' + attachment.url + '" alt="" style="max-width:100%;"/>');

                    // Send the attachment url to our hidden input
                    imgInput.val(attachment.url);

                    // Hide the add image link
                    addImg.addClass('hidden');

                    // Unhide the remove image link
                    delImg.removeClass('hidden');
                });

                // Finally, open the modal on click
                frame.open();
            });
            // DELETE IMAGE LINK
            delImg.on('click', function (event) {

                event.preventDefault();

                // Clear out the preview image
                imgContainer.html('');

                // Un-hide the add image link
                addImg.removeClass('hidden');

                // Hide the delete image link
                delImg.addClass('hidden');

                // Delete the image id from the hidden input
                imgInput.val('');

            });
        })
    });
}

// init function allowing adding and deleting images in category
addDeleteImage();