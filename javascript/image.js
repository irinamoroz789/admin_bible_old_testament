const dt = new DataTransfer();

function changeImage(elem){
    let $files_list = $(elem).closest('.input-file').next();
    $files_list.empty();

    for(let i = 0; i < elem.files.length; i++){
        let file = elem.files.item(i);
        // dt.items.add(file);

        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function(){
            let new_file_input = '<div class="input-file-list-item">' +
                '<img class="input-file-list-img" src="' + reader.result + '">' +
                '<span class="input-file-list-name">' + file.name + '</span>' +
                '<a href="#" onclick="removeFilesItem(this); return false;" class="input-file-list-remove">x</a>' +
                '</div>';
            $files_list.append(new_file_input);
        }
    }
    // elem.files = dt.files;
}

function removeImageTheme(file){
    $(file).closest('.input-file-list-item').remove();
}

function removeFilesItem(target){
    let name = $(target).prev().text();
    let input = $(target).closest('.input-file-row').find('input[type=file]');
    $(target).closest('.input-file-list-item').remove();
    for(let i = 0; i < dt.items.length; i++){
        if(name === dt.items[i].getAsFile().name){
            dt.items.remove(i);
        }
    }
    input[0].files = dt.files;
}