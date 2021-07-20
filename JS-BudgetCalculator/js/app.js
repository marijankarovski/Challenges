$(document).ready(function () {
    let totalExpences = 0;
    let expences = $("#expense-amount");
    let budget = $("#budget-amount");
    let balance = $("#balance-amount");
    let budgetInput = $("#budget-input");


    function deleteRow(row) {
        let temp = $(row).closest('tr').children("td");
        let value = parseInt(temp[1].innerText);
        updateData(value);
        $(row).closest("tr").remove();
        if ($("tr").length == 1) {
            $("#table").remove();
        }
    };

    function updateData(value) {
        totalExpences -= value;
        $(expences).text(totalExpences);
        $(balance).text(budget.text() - expences.text());
    }



    $("#budget-input").focus(function () {
        $(".budget-feedback").hide();
    })
    $("#expense-input").focus(function () {
        $(".expense-feedback").hide();
    })
    $("#amount-input").focus(function () {
        $(".expense-feedback").hide();
    })

    $("#budget-submit").click(function (e) {
        e.preventDefault();
        if (budgetInput.val() == "" || budgetInput.val() < 0) {
            $(".budget-feedback").show();
            return;
        }
        budget.text(budgetInput.val());
        balance.text(budget.text() - expences.text());
        budgetInput.val('');
    })

    $(document).unbind().on('click', '.edit', function () {
        let data = $(this).closest('tr').children("td");
        let expInput = $(this).closest('tr').children("td").children("span");
        $("#expense-input").val(expInput.text());
        $("#amount-input").val(data[1].innerText);
        deleteRow(this);
    });

    $("#expense-submit").click(function (e) {
        e.preventDefault();
        let expenseInput = $("#expense-input").val();
        let amountInput = $("#amount-input").val();
        if (!expenseInput || !amountInput) {
            $(".expense-feedback").text("Please enter Expense Title and Amount")
            $(".expense-feedback").show();
            return;
        }
        amountInput = parseInt(amountInput);
        totalExpences += amountInput;
        expences.text(totalExpences);
        balance.text(budget.text() - expences.text());

        if ($("#table").length == 0) {
            let table = document.createElement("table");
            $(table).attr("id", "table");
            $(table).addClass("table");
            $(table).addClass("text-center");
            $(table).html(`
                        <thead>
                        <td><strong>Expence Title</strong></td>
                        <td><strong>Expence Value</strong></td>
                        <td></td>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-danger">- <span>${expenseInput.toUpperCase()}</span></td>
                            <td class="text-danger">${amountInput}</td>
                            <td><i class="far fa-edit edit text-primary mr-3"></i>
                                <i class="fas fa-trash-alt delete text-danger"></i></td>
                            </tr></tbody>`);
            $("#tableDIV").append(table);
            $("#expense-input").val("");
            $("#amount-input").val("");
        } else {
            let row = document.createElement("tr");
            $(row).html(`
                        <td class="text-danger">- <span>${expenseInput.toUpperCase()}</span></td>
                        <td class="text-danger">${amountInput}</td>
                        <td><i class="far fa-edit edit text-primary mr-3"></i><i class="fas fa-trash-alt delete text-danger"></i></td>`);
            document.querySelector("tbody").appendChild(row);
            $("#expense-input").val("")
            $("#amount-input").val("")
        }

        $(".delete").unbind().click(function () {
            deleteRow(this);
        })
    })

})