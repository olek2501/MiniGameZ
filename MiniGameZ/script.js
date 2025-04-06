var a = sessionStorage.getItem("uno");
var b = sessionStorage.getItem("dos");
var c = sessionStorage.getItem("tres");
var d = sessionStorage.getItem("debug");
if(a == 1 & b == 1 & c == 1){
    alert('Gratulacje pokonałeś wszystkie minigierki! Odblokowałeś "Wyjście".')
}
if(d == 1){
    document.write(a);
    document.write(b);
    document.write(c);
}