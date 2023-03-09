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
    const kosarhozgomb = document.getElementsByClassName('kosarhoz')
    console.log("Ez a kosár gomb",kosarhozgomb);
    let cuccok = [];
    for (let i = 0; i < kosarhozgomb.length; i++) {
        kosarhozgomb[i].addEventListener("click",function(e){
            //console.log("Ez a kosár forciklus belseje, a storage vizsgálat elött");
            if(typeof(Storage) !== 'undefined'){
                //console.log("Ez a storage ág",e);
                //console.log("parent element",e.target.parentElement.children[0].value);
                let cucc = {                   
                    id: i + 1, 
                    name: e.target.parentElement.parentElement.parentElement.children[0].children[1].innerHTML,
                    no: parseInt(e.target.parentElement.parentElement.children[1].innerHTML),
                    price: parseInt(e.target.parentElement.parentElement.children[2].innerHTML),
                    darab: parseInt(e.target.parentElement.children[0].value),
               };
                console.log(cucc);
                //adjuk hozzá a localstoragehez az elemet.
                if (JSON.parse(localStorage.getItem('cuccok')) === null){
                    cuccok.push(cucc);
                    //tárolás locaslban
                    localStorage.setItem("cuccok",JSON.stringify(cuccok));
                    window.location.reload();
                }else{
                    const localcuccok = JSON.parse(localStorage.getItem("cuccok"));
                    console.log(localcuccok);
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
    tableData += '<tr><th>Cikk szám</th><th>Termék neve</th><th>Darab</th><th>Termék ár</th><th>Törlés</th></tr>';
    if(JSON.parse(localStorage.getItem('cuccok')) [0] === null){
        //Ha nincs hozzá adva termék akkor legyen egy üres sor.
        tableData += '<tr><td colspan="5"></td></tr>';
    }else{
        JSON.parse(localStorage.getItem('cuccok')).map(data => {
            tableData += '<tr><td>'+data.id+'</td><td>'+data.name+'</td><td>'+data.darab+'</td><td>'+data.price* data.darab+'</td><td><a href="#" onclick=Delete(this);>Törlés</a></td></tr>';
        })
    }
    let sum = 0;
    JSON.parse(localStorage.getItem('cuccok')).map(data =>{
        sum += data.darab * data.price;
    });
    tableData += '<tr><td colspan="3" class="jobb"><a href="megrendeles.html">Megrendelés</a></td><td>'+ sum +'</td><td><a href="#" onclick="deleteall(this)">Összes törlése</a></td></tr>';
    cardBoxTable.innerHTML =tableData;
}
/**Törlés a kosárból*/
function Delete(elem){
    let cuccok = [];
    JSON.parse(localStorage.getItem('cuccok')).map(data =>{
        if(data.id != elem.parentElement.parentElement.children[0].textContent){
            cuccok.push(data);
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
    window.location.href = "megrendeles.html";
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
}


