document.addEventListener('DOMContentLoaded', () => {
    //<!--Education-->
    const NumEduFields = document.getElementById('NumEduFields');
    const moreEduFieldButtom = document.getElementById('moreEduFieldButtom');
    const lessEduFieldButtom = document.getElementById('lessEduFieldButtom');

    //<!--Social media-->
    const NumSocialFields = document.getElementById('NumSocialFields');
    const moreEduSocialdButtom = document.getElementById('moreEduFieldButtom');
    const lessEduSocialdButtom = document.getElementById('lessEduFieldButtom');

    

    //Events to add and to remove inputs
    function removeInputs(obj, val){
        if(val.value > 0){
            val.value--;
            obj.nextSibling.remove();
            obj.nextSibling.remove();
            obj.nextSibling.remove();
        }
    }

    function addNewInputs(obj, val, str, name){
        if(val.value >= 0){
            val.value++;
            i = val.value;
            obj.insertAdjacentHTML('afterend',`
            <div class="form-floating m-2">
                <input type="text" type="text" name="${name}${i}" class="form-control m-2" id="nEducation label" placeholder="Education field" required>
                <label for="nEducation ">${str} : ${i}</label>
            </div>
            `);
        }

    }

    //<!--Education-->
    lessEduFieldButtom.addEventListener('click', (e) =>{
         removeInputs(lessEduFieldButtom, NumEduFields);
    });

    moreEduFieldButtom.addEventListener('click', (e) =>{
         addNewInputs(lessEduFieldButtom, NumEduFields, "Tell something about you","nEducation" );
    });



    //<!--Social media-->
    lessSocialFieldButtom.addEventListener('click', (e) =>{
         removeInputs(lessSocialFieldButtom, NumSocialFields);
    });

    moreSocialFieldButtom.addEventListener('click', (e) =>{
         addNewInputs(lessSocialFieldButtom, NumSocialFields, "Add a education","nSocialM");
    });

    function onsubmit(){

        NumEduFields.removeAttribute('disabled');
    }

    
});