let arg = new Object;
function getUrlParameter(){
    let status = location.search.substring(1).split('&');
    for(let i=0;status[i];i++) {
    let kv = status[i].split('=');
    arg[kv[0]]=kv[1];
    }
}



