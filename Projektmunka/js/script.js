window.onload = function(){

    //console.log("Ez a windowOnload eleje");
    const kosarikon = document.querySelector('.kosarikon');
    //console.log(kosarikon);
    const cartCloseBtn = document.querySelector('.fa-close');
    //console.log("Írd má ki:" + cartCloseBtn);
    const cartBox = document.querySelector('.cartBox');
    //console.log(cartBox);
    
    kosarikon.addEventListener("click",function(){
        cartBox.classList.add('active');
    })
    cartCloseBtn.addEventListener("click",function(){
        cartBox.classList.remove('active');
    })
    const kosarhozgomb = document.getElementsByClassName('kosarhoz');

    let cuccok = [];

/*
    if(JSON.parse(localStorage.getItem('cuccok')) === null) {
        localStorage.setItem("cuccok", cuccok);
    }
*/
    for (let i = 0; i < kosarhozgomb.length; i++) {
        kosarhozgomb[i].addEventListener("click",function(e){
           let raktardb = parseInt(e.target.parentElement.parentElement.children[1].innerHTML);
           if(parseInt(e.target.parentElement.children[0].value) > raktardb ) {
            Swal.fire(
                'Figyelem!',
                'Nincs ennyi termék raktáron!',
                'warning'
              )
              return false;
        };
                if(parseInt(e.target.parentElement.children[0].value)== 0){
                    Swal.fire(
                        'Figyelem!',
                        'Kérjük állítsa be hány darab terméket szeretne rendelni!',
                        'warning'
                    )
                    return false;
                 };
            // if ((e.target.parentElement.parentElement.parentElement.children[0].innerHTML)== "Belépés") {
            //     Swal.fire(
            //         'Figyelem!',
            //         'Rendeléshez belépés szükséges',
            //         'warning'
            //       )
            //       return false;
            // }
            //console.log("Ez a kosár forciklus belseje, a storage vizsgálat elött");
            if(typeof(Storage) !== 'undefined'){
                //console.log("Ez a storage ág",e);
                //console.log("parent element",e.target.parentElement.children[0].value);
                let cucc = {                   
                    id: parseInt(e.target.parentElement.parentElement.parentElement.children[0].children[2].innerHTML), 
                    name: e.target.parentElement.parentElement.parentElement.children[0].children[1].innerHTML,
                    no: parseInt(e.target.parentElement.parentElement.children[1].innerHTML),
                    price: parseInt(e.target.parentElement.parentElement.children[2].innerHTML),
                    darab: parseInt(e.target.parentElement.children[0].value),
                    termek_id: parseInt(e.target.dataset.product_id),
               };
                console.log("a cucc",cucc);
                //adjuk hozzá a localstoragehez az elemet.
                if (JSON.parse(localStorage.getItem('cuccok')) === null){
                    cuccok.push(cucc);
                    //tárolás locaslban
                    localStorage.setItem("cuccok",JSON.stringify(cuccok));
                    window.location.reload();
                }else{
                    const localcuccok = JSON.parse(localStorage.getItem("cuccok"));
                    console.log("localcuccok",localcuccok);
                    localcuccok.map(data =>{
                        if(cucc.id == data.id){
                            cucc.darab += data.darab;
                        }else{
                            cuccok.push(data);
                        }
                    });
                    cuccok.push(cucc);
                    localStorage.setItem('cuccok',JSON.stringify(cuccok));
                    window.location.reload();
                }
            }else{
                alert('A local storage nem működik a böngészőjében!');
            }
        });
    }
    //Rendelés hozzáadása a kosárhoz
    const kosarikonP = document.querySelector('.kosarikon p');
    console.log("kosarikonP",kosarikonP);

    let no = 0;
    JSON.parse(localStorage.getItem('cuccok')).map(data =>{
        no = no + data.darab;
        
    });

    kosarikonP.innerHTML = no;
    //Kosár feltöltése.
    const cardBoxTable = document.querySelector('table');
    console.log(cardBoxTable);
    let tableData = '';
    //fejléc
    tableData += '<tr><th>Cikk szám</th><th>Termék neve</th><th>Darab</th><th>Termék ár</th><th>Darab törlés</th><th>Kategoria törlése</th></tr>';
    if(JSON.parse(localStorage.getItem('cuccok')) [0] === null){
        //Ha nincs hozzá adva termék akkor legyen egy üres sor.
        tableData += '<tr><td colspan="5"></td></tr>';
    }else{
        JSON.parse(localStorage.getItem('cuccok')).map(data => {
            tableData += '<tr id="sor_'+data.id+'"><td>'+data.id+'</td><td>'+data.name+'</td><td class="darab">'+data.darab+'</td><td>'+data.price* data.darab+'</td><td><input  name="dbTorles" id="productNumber_'+data.termek_id+'" onchange=deleteProductAmount('+data.termek_id+')></td><td><a href="#" onclick=Delete(this);>  Törlés</a></td></tr>';
        }) 
        
        }
    let sum = 0;
    JSON.parse(localStorage.getItem('cuccok')).map(data =>{
        sum += data.darab * data.price;
    });
    tableData += '<tr><td colspan="3" class="jobb"><a href="megrendeles.php">Megrendelés</a></td><td>'+ sum +'</td><td colspan="2"><a href="#" onclick="deleteall(this)">Összes törlése</a></td></tr>';
    cardBoxTable.innerHTML =tableData;
}
/**Törlés a kosárból*/
function Delete(elem){
    let cuccok = [];
    JSON.parse(localStorage.getItem('cuccok')).map(data =>{
        if(data.id != elem.parentElement.parentElement.children[0].textContent){
            
            cuccok.push(data);
            let deletedid = data.id;
            console.log(deletedid);
        }
    });
    localStorage.setItem("cuccok", JSON.stringify(cuccok));
    window.location.reload();
}
function deleteall(){
    let cuccok = [];
    JSON.parse(localStorage.getItem('cuccok')).map(data =>{
        cuccok.splice(data);
    });
    localStorage.setItem("cuccok", JSON.stringify(cuccok));
    window.location.reload();
}
function megrendeles(){
    window.location.href = "megrendeles.php";

}
// Kereső
function search_item() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('card');
    for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="flex";  
        }
    }
    let cardContainer = document.getElementsByClassName('cards')[0];
    let empty = true;
    for (const card of cardContainer.children) {
        if (card.style.display != "none") {
            empty = false;
        }
    }
    let footer = document.getElementById('scroll');
    if (empty) {
        // console.log("Üres");
        footer.style.position = "absolute";
        cardContainer.parentElement.children[0].classList.remove("hidden");
    }
    else {
        //nincsentalalat
        // console.log("Nem üres");
        footer.style.position = "static";
        cardContainer.parentElement.children[0].classList.add("hidden");
    }
}
//admin kereső
function search_itemadmin() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('nev');
    for (i = 0; i < x.length; i++) {
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].parentElement.classList.add("hidden");
        }
        else {
            x[i].parentElement.classList.remove("hidden");
        }
    }
}

let modal = document.getElementById('modal');
let images = document.getElementsByClassName('cikkkep');
for (const image of images) {
    image.addEventListener("dblclick", () => {
        modal.children[0].src = image.src;
        modal.classList.remove("hidden");
    });
}

modal.children[1].addEventListener("click", () => {
    modal.classList.add("hidden");
});
//galeria kep
let mod = document.getElementById('modal');
let imagesgaleria = document.getElementsByClassName('galeriakep');
for (const image of imagesgaleria) {
    image.addEventListener("dblclick", () => {
        modal.children[0].src = image.src;
        modal.classList.remove("hidden");
    });
}

modal.children[1].addEventListener("click", () => {
    modal.classList.add("hidden");
});


function profilinfo(){
    if (document.getElementById("profilid").className == "profilinfo")
    {
      document.getElementById("profilid").className = "profilinfofel";
    }
    else {
      document.getElementById("profilid").className = "profilinfo";
    }

}
function megrendelve(){
    if (document.getElementById("profilid").className == "profilinfo")
    {
      document.getElementById("profilid").className = "piros";
    }
    else {
      document.getElementById("profilid").className = "profilinfo";
    }
}

function deleteProductAmount(termek_id) {
    let product = localStorage.getItem("cuccok");

    $.ajax({
        method: "POST",
        url: "../api.php",
        dataType: "JSON",
        data: { c: "deleteProductAmount", termek_id: termek_id, darab_szam: $("#productNumber_"+termek_id).val(), product: product},         
        success:function(result) {
            
            if(result.deleteline) {
                $("#sor_"+result.lineid).remove();                
            } else {
                $("#sor_"+result.lineid+" .darab").text(result.newAmount);
            }

            localStorage.setItem("cuccok", JSON.stringify(result.products));
        }                       
    })
}


jQuery(document).ready(function($){
    $('select').select2({width:100});
    $('b[role="presentation"]').hide();
    $('.select2-selection__arrow').append('<i class="fa fa-angle-down"></i>');
});
