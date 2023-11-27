$(window).on("load", function () {
    $(".loading-animation-wrapper").fadeOut("slow");
});
$(document).ready(function () {
    $(".add-to-favorites").on("click", function () {
        const phoneId = $(this).data("phone-id");
        addToFavorites(phoneId);
    });
    $(".remove-fav").on("click", function () {
        const favId = $(this).data("fav-id");
        removeFavorites(favId);
    });
});

function addToFavorites(phoneId) {
    $.ajax({
        url: "/favorite/add/" + phoneId,
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            toastr.success(response.message);
            var numberSpan = $("#fav-count");
            var number = parseInt(numberSpan.text());
            var incrementedNumber = number + 1;
            numberSpan.text(incrementedNumber);
        },
        error: function (xhr, status, error) {
            toastr.error(xhr.responseJSON.message);
            // Show an error message or handle the error as needed
        },
    });
}
// function removeFavorites(faveId) {
//     var currentRow = $(event.target).closest("tr");
//     $.ajax({
//         url: "/favorite/remove/" + faveId,
//         method: "GET",
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: function (response) {
//             toastr.success(response.message);
//             currentRow.remove();
//         },
//         error: function (xhr, status, error) {
//             toastr.error(xhr.responseJSON.message);
//         },
//     });
// }


$(document).ready(function () {
    $(".addToCart").on("click", function () {
        var phoneId = $(this).data("phone-id");

        $.ajax({
            url: "/cart/add",
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                phone_id: phoneId,
                // quantity: 1 // Uncomment and modify as needed
            },
            success: function (response) {
                toastr.success(response.message);
                var numberSpan = $("#cart-count");
                var number = parseInt(numberSpan.text());
                var incrementedNumber = number + 1;
                numberSpan.text(incrementedNumber);
            },
            error: function (xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
                // Show an error message or handle the error as needed
            },
        });
    });
    $(".checkoutBtn").on("click", function () {
        var phoneId = $(this).data("phone-id");

        $.ajax({
            url: "/cart/add",
            method: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                phone_id: phoneId,
                // quantity: 1 // Uncomment and modify as needed
            },
            success: function (response) {
                // toastr.success(response.message);

                document.location.href = "/checkout";
            },
            error: function (xhr, status, error) {
                toastr.error(xhr.responseJSON.message);
                // Show an error message or handle the error as needed
            },
        });
    });
});

///////Home page phones sort///

function getPhones() {
    $("#loading-spinner").show();
    $("#phone-list").hide();
    $("#no-result").hide();
    var sort_date = $("#sort-date").val();
    var sort_price = $("#sort-price").val();
    var search = $("#search").val();
    var minPrice = $("#min-price").val();
    var maxPrice = $("#max-price").val();
    // Get the values of the inputs with class "category_filter"
    var categoryFilters = [];
    $(".category_filter:checked").each(function () {
        var inputName = $(this).attr("name");
        var inputValue = $(this).val();
        categoryFilters.push({ name: inputName, value: inputValue });
    });

    $.ajax({
        url: "/",
        type: "GET",
        data: {
            sort_date: sort_date,
            sort_price: sort_price,
            search: search,
            category_filters: categoryFilters,
            min_price: minPrice,
            max_price: maxPrice,
        },
        success: function (response) {
            $("#phone-list").html(response.html);
            if (response.isEmpty) {
                $("#no-result").show();
            } else {
                $("#no-result").hide();
            }
        },
        complete: function () {
            // Hide the loading spinner
            $("#loading-spinner").hide();
            $("#phone-list").show();
        },
    });
}

$(document).ready(function () {
    $("#sort-date, #sort-price").change(function () {
        getPhones();
    });
    ///// Binding change event to inputs with class "category_filter"
    $(".category_filter").change(function () {
        console.log("Changed");
        getPhones();
    });

    //// Binding keyup event to the "search" input
    $("#search").keyup(function () {
        getPhones();
    });

    /////Price filter
    $(".price_filter").keyup(function () {
        getPhones();
    });
});

$(".resetfilter").on("click", function () {
    $('input.category_filter[type="radio"]').each(function () {
        if ($(this).val() !== "all") {
            $(this).prop("checked", false);
        } else {
            $(this).prop("checked", true);
        }
        $('.price_filter').val("");
    });
    getPhones();
});

/////Add To compare//

$(".add-to-compare").on("click", function (e) {
    e.preventDefault();

    var phoneId = $(this).data("phone-id");

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/compare/add",
        type: "POST",
        data: { phone_id: phoneId },
        success: function (response) {
            toastr.success(response.message);
            var numberSpan = $("#compare-count");
            var number = parseInt(numberSpan.text());
            var incrementedNumber = number + 1;
            numberSpan.text(incrementedNumber);
        },
        error: function (xhr, status, error) {
            toastr.error(xhr.responseJSON.message);
            // Show an error message or handle the error as needed
        },
        complete: function (data) {
            console.log(data);
        },
    });
});

////Remove from compare

$(document).ready(function () {
    var search = document.getElementById("search");
    search.addEventListener("focus", (event) => {
        document.getElementById("navbar-search").style.border =
            "1px solid " + $("#nav-search-btn").css("backgroundColor");
    });

    search.addEventListener("focusout", (event) => {
        document.getElementById("navbar-search").style.border = "none";
    });
});

// Check if profile menue is active
const menuItems = document.querySelectorAll(".nav-link-style");
const currentUrl = window.location.href;

menuItems.forEach((item) => {
    if (item.getAttribute("href") === currentUrl) {
        item.classList.add("nav-menu-active");
    }
});
