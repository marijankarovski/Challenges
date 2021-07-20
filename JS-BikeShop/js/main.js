$(document).ready(function () {

    // Funkcii

    function removeCSS() {
        $(".filterBadge, .filterGender, #showAllText").removeClass("orange");
        $(".filterBadge, .filterGender, #showAllText").removeClass("bold");
        $("#showAllNumber").removeClass("orangeBG");
        $(".filterBadge").children("p:last-child").removeClass("orangeBG");
        $(".filterGender").children("p:last-child").removeClass("orangeBG");
    };

    function filterBadge(data, brand) {
        let newData = data.filter(name => name.brand == brand);
        return newData;
    };

    function filterGender(data, gender) {
        let newData = data.filter(name => name.gender == gender);
        return newData;
    };

    function showAll(data) {
        removeCSS()
        $("#cards").empty();
        $("#showAllText").addClass("orange");
        $("#showAllText").addClass("bold");
        $("#showAllNumber").addClass("orangeBG");
        $(data).each(function (i, bike) {
            drawCards(bike);
        })
    };


    function drawCards(bike) {
        $("#cards").append(`
        <div class="col-4 my-2">
        <div class="card">
            <img src="img/${bike.image}.png" class="card-img card-img-top p-3">
        <div class="card-body orangeCard">
            <p class="card-title fw-bold">${bike.name}</p>
            <p class="card-title">${bike.price} $</p>
        </div>
        </div>
        </div>
        `)
    };

    // Kod
    $.get("https://json-project3.herokuapp.com/products", function (data) {
        showAll(data);
        let brands = {};
        let male = 0;
        let female = 0;

        // foreach za populacija na brand, gender i badges.
        $(data).each(function (i, bike) {
            if (brands.hasOwnProperty(bike.brand)) {
                brands[bike.brand] += 1;
            } else {
                brands[bike.brand] = 1;
            }

            if (bike.gender == 'MALE') {
                male++;
            } else {
                female++;
            }
        });

        $("#showAllNumber").text(data.length);
        $("#filterMaleNumber").text(male);
        $("#filterFemaleNumber").text(female);

        $.each(brands, function (brand, number) {
            $("#filterBrand").append(`
            <div class="d-flex justify-content-between filterBadge">
            	<p>${brand}</p><p class="badge rounded-pill text-dark">${number}</p>
            </div>
            `);
        });

        $(".filterBadge").click(function () {
            removeCSS()
            $(this).addClass("orange");
            $(this).addClass("bold");
            $(this).children("p:last-child").addClass("orangeBG");
            $("#cards").empty();
            let name = $(this).children("p:first-child").text();
            console.log(name);
            let dataFiltered = filterBadge(data, name);
            $(dataFiltered).each(function (i, bike) {
                drawCards(bike);
            })
        })

        $(".filterGender").click(function () {
            removeCSS()
            $(this).addClass("orange");
            $(this).addClass("bold");
            $(this).children("p:last-child").addClass("orangeBG");
            $("#cards").empty();
            let gender = $(this).children("p:first-child").text();
            let dataFiltered = filterGender(data, gender);
            $(dataFiltered).each(function (i, bike) {
                drawCards(bike);
            })
        });

        $("#showAll").click(function () {
            showAll(data);
        });

    });
});