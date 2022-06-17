document
    .getElementById("filter_company_id")
    .addEventListener("change", function () {
        // alert(this.value);
        // alert(this.options[this.selectedIndex].value);
        let comapnayId = this.value || this.options[this.selectedIndex].value
        window.location.href = window.location.href.split('?')[0] + '?company_id='+ comapnayId
    });
