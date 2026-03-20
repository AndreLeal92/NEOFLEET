<script>

function toggleSidebar(){
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    sidebar.classList.toggle('open');
    overlay.classList.toggle('active');

    // desktop colapsar
    sidebar.classList.toggle('closed');
}

function toggleDropdown(el){

    // fecha outros dropdowns
    document.querySelectorAll('.dropdown').forEach(d => {
        if(d !== el.parentElement){
            d.classList.remove('open');
        }
    });

    // abre o clicado
    el.parentElement.classList.toggle('open');
}

</script>