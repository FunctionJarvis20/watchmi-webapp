var closebtn=document.getElementById('close-btn');
var menubtn=document.getElementById('menu');
closebtn.addEventListener('click',close);
menubtn.addEventListener('click',open);
document.getElementById('list').addEventListener('click',changeState);
document.getElementById('search-input').addEventListener('focus',changeBorder);
document.getElementById('search-input').addEventListener('blur',changeBorder);


function changeBorder(e){
    if(e.type=='focus'){
    document.getElementById('search-container').style.borderBottomColor='dodgerblue';
    document.getElementById('search-icon').style.color='dodgerblue'; 
    
    }


    else{
    document.getElementById('search-container').style.borderBottomColor='rgb(124, 122, 122)';
    document.getElementById('search-icon').style.color='rgb(124, 122, 122)'; 
    }
}

function changeState(e){
    var active_elem= document.getElementById('active');
    active_elem.removeAttribute('id');
    var link= e.target;
    link.setAttribute('id','active');

}
function close(){
    document.getElementById('sidenav').style.width='0';
    document.getElementById('sidenav').style.transition='0.2s';
  
}
function open(){
    document.getElementById('sidenav').style.width='270px';
    document.getElementById('sidenav').style.transition='0.6s';
}
