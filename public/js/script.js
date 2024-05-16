$(document).ready(function(){

    $("input[name='password']").next("span.input-group-btn").find("button").click(function (){
        let icon = $(this).find("i");
        if(icon.hasClass("fa-eye")){
            icon.removeClass("fa-eye");
            icon.addClass("fa-eye-slash");
            $("input[name='password']").attr("type", "text");
        }else{
            icon.removeClass("fa-eye-slash");
            icon.addClass("fa-eye");
            $("input[name='password']").attr("type", "password");
        }
    });
    $("img#image-placeholder").click(function(){
        $("input[name='image']").click();
    });
    $("input[name='image']").change(function(event){
        const image = event.target.files[0];
        const src = URL.createObjectURL(image);
        $("img#image-placeholder").attr("src", src);
    });
    $("img#logo").click(function(){
        $("input[name='logo']").click();
    });
    $("input[name='logo']").change(function(event){
        const image = event.target.files[0];
        const src = URL.createObjectURL(image);
        $("img#logo").attr("src", src);
    });
    $("img#favicon").click(function(){
        $("input[name='favicon']").click();
    });
    $("input[name='favicon']").change(function(event){
        const image = event.target.files[0];
        const src = URL.createObjectURL(image);
        $("img#favicon").attr("src", src);
    });

    $("#company_id").change(function () {
        let company_id = $(this).val();
        var url = window.location.origin + "/api/organizations/" + company_id;
        if (company_id !== '') {
            let organization = $("#organization_id");
            organization.html("");
            let loading = new Option("--Loading--", "");
            $(loading).html("--Please Wait--");
            organization.append(loading);
            organization.attr('disabled', 'true');
            $.ajax({
                type: 'GET',
                url: url,
                success: function (data) {
                    let organizations = data["organizations"];
                    organization.html("");
                    organization.removeAttr('disabled');
                    let select_option = new Option("--Select Organization--", "");
                    $(select_option).html("--Select Organization--");
                    organization.append(select_option);
                    for (let i = 0; i < organizations.length; i++) {
                        let o = new Option(organizations[i].name, organizations[i].id);
                        $(o).html(organizations[i].name);
                        organization.append(o);
                    }
                }
            });
        }
    });

    $("#organization_id").change(function () {
        let organization_id = $(this).val();
        var url = window.location.origin + "/api/departments/" + organization_id;
        if (organization_id !== '') {
            let department_id = $("#department_id");
            department_id.html("");
            let loading = new Option("--Loading--", "");
            $(loading).html("--Please Wait--");
            department_id.append(loading);
            department_id.attr('disabled', 'true');
            $.ajax({
                type: 'GET',
                url: url,
                success: function (data) {
                    let departments = data["departments"];
                    department_id.html("");
                    department_id.removeAttr('disabled');
                    let select_option = new Option("--Select Organization--", "");
                    $(select_option).html("--Select Organization--");
                    department_id.append(select_option);
                    for (let i = 0; i < departments.length; i++) {
                        let o = new Option(departments[i].name, departments[i].id);
                        $(o).html(departments[i].name);
                        department_id.append(o);
                    }
                }
            });
        }
    });

});