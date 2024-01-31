let ID=document.getElementById('ID')
let Name=document.getElementById('Name')
let Manager=document.getElementById('Manager')

let dataarr=[];
let temp;
mood='add';
if (localStorage.branchs != null) {
    dataarr = JSON.parse(localStorage.branchs)
}else{ dataarr=[];} 
addb.onclick=function() {
    if (ID.value === '' || Name.value === '' || Manager.value === '') {
        return;
    }
    let newbr = {
        ID: ID.value,
        Name: Name.value,
        Manager: Manager.value, 
    };
    if(mood==='add'){    dataarr.push(newbr);
        localStorage.setItem( 'branchs',JSON.stringify(dataarr))
    }else{
        dataarr[temp]=newbr;
        localStorage.setItem( 'branchs',JSON.stringify(dataarr))
        mood = 'add';
        addb.innerHTML='ADD BRANCHES';
    }     
    clearData();
    viewdata();
};
clearData()
function clearData(){
    ID.value= '';
    Name.value='';
    Manager.value='';
}

function viewdata(){
    let table='';
    for (let i = 0; i < dataarr.length; i++) {
        table +=`
        <tr>
        <td>${dataarr[i].ID}</td>
        <td>${dataarr[i].Name}</td>
        <td>${dataarr[i].Manager}</td>
        <td><button class="tbutton" onclick="updatedata(${i})" id="update">Update</button></td>
        <td><button class="tbutton" onclick="deletedata(${i})" id="delete">Delete</button></td>
        </tr>
        `;
    }
    document.getElementById('tbodyb').innerHTML = table;
    viewdata();
};
viewdata();
function deletedata(i){
    dataarr.splice(i,1);
    localStorage.branchs = JSON.stringify(dataarr);
    viewdata();
    }
    function updatedata(i){
        ID.value=dataarr[i].ID;
        Name.value=dataarr[i].Name;
        Manager.value=dataarr[i].Manager;
        addb.innerHTML='Update';
        mood = 'update';
        temp = i ;
        document.getElementById('add-branches').scrollIntoView({ behavior: 'smooth' });
    }
    function searchdata(value){
        let table='';
    for(let i=0; i<dataarr.length;i++){
        if(dataarr[i].NameB.includes(value)){
            table +=`
            <tr>
            <td>${dataarr[i].ID}</td>
            <td>${dataarr[i].Name}</td>
            <td>${dataarr[i].Manager}</td>
            <td><button class="tbutton" onclick="updatedata(${i})" id="update">Update</button></td>
            <td><button class="tbutton" onclick="deletedata(${i})" id="delete">Delete</button></td>
            </tr>
            `;
        }
    }
    document.getElementById('tbodyb').innerHTML = table;
    }
    function searchdata(value){
        let table='';
    for(let i=0; i<dataarr.length;i++){
        if(dataarr[i].Name.includes(value)){
            table +=`
            <tr>
            <td>${dataarr[i].ID}</td>
            <td>${dataarr[i].Name}</td>
            <td>${dataarr[i].Manager}</td>
            <td><button class="tbutton" onclick="updatedata(${i})" id="update">Update</button></td>
            <td><button class="tbutton" onclick="deletedata(${i})" id="delete">Delete</button></td>
            </tr>
            `;
        }
    }
    document.getElementById('tbodyb').innerHTML = table;
    }
    //account codes

