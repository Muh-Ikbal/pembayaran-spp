// document.getElementById("sppSelect").addEventListener("change", function () {
//     var nominal = this.options[this.selectedIndex].getAttribute("data-nominal");
//     console.log(nominal);
//     document.getElementById("jumlahBayar").value = nominal;
// });

// // Trigger change event on page load to set default value
// document.getElementById("sppSelect").dispatchEvent(new Event("change"));

// function cekPembayaran($id) {
//     window.location.href =
//         "http://localhost/pembayaran-spp/public/siswa/cekStatus/" + $id;
// }

document.addEventListener("DOMContentLoaded", () => {
    // dapatka url
    let currentPage = window.location.pathname.split("/").pop();

    const sideBar = document.querySelectorAll(".sidebar-item");
    sideBar.forEach((elem)=>{
        elem.classList.remove('active')
        let page = elem.getAttribute("data-page");
        if (currentPage == page || (currentPage == "" && page == "dashboard")) {
            elem.classList.add("active");
        }
    })
        
    
});





