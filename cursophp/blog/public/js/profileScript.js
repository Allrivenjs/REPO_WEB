document.addEventListener('DOMContentLoaded', () => {
    //<!--Education-->
    const NumEduFields = document.getElementById('NumEduFields');
    const moreEduFieldButtom = document.getElementById('moreEduFieldButtom');
    const lessEduFieldButtom = document.getElementById('lessEduFieldButtom');

    //<!--Social media-->
    const NumSocialFields = document.getElementById('NumEduFields');
    const moreEduSocialdButtom = document.getElementById('moreEduFieldButtom');
    const lessEduSocialdButtom = document.getElementById('lessEduFieldButtom');

    //Events to add and to remove inputs
    function removeInputs(obj, val){
        if(NumEduFields.textContent > 0){
            NumEduFields.textContent--;
            obj.nextSibling.remove();
            obj.nextSibling.remove();
            obj.nextSibling.remove();
        }
    }

    function addNewInputs(obj, val, str){
        if(NumEduFields.textContent >= 0){
            NumEduFields.textContent++;
            obj.insertAdjacentHTML('afterend',`
            <div class="form-floating mb-3">
                <input type="text" name="nEducation${val}" class="form-control" id="nEducation label" placeholder="Education field">
                 <label for="nEducation p-1">${str}</label>
            </div>
            `);
        }
    }

    //<!--Education-->
    lessEduFieldButtom.addEventListener('click', (e) =>{
         removeInputs(lessEduFieldButtom, NumEduFields.textContent);
    });

    moreEduFieldButtom.addEventListener('click', (e) =>{
         addNewInputs(lessEduFieldButtom, NumEduFields.textContent, "Tell something about you");
    });

    //<!--Social media-->
    lessSocialFieldButtom.addEventListener('click', (e) =>{
         removeInputs(lessSocialFieldButtom, NumSocialFields.textContent);
    });

    moreSocialFieldButtom.addEventListener('click', (e) =>{
         addNewInputs(lessSocialFieldButtom, NumSocialFields.textContent, "Add a social media");
    });
});