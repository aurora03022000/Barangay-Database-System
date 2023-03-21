<!-- Para ni sa search para kung mag click ak sa gawas na close sya --> 
<script>
// Get the element
var checker=0

// When the user clicks anywhere outside of the modal, close it
window.onload = function() {
    var list = document.getElementById('list');
    var searchbutton = document.getElementById('search-button');
    var divbutton = document.getElementById('div-button');
    var isearch = document.getElementById('i-search');
    var isort = document.getElementById('i-sort');

    document.onclick=function(body){
        if (event.target !== searchbutton && event.target !== divbutton && event.target !== isearch && event.target !== isort) {
        list.style.display = "none";
        checker=0;
        
  }
  
 


    };
    
}; 


</script>