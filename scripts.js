function qtyChange(event) {
  var input = event.target;
  if (isNaN(input.value) || input.value < 0) {
    input.value = 1;
  }
  updateCartTotal();
}

let tempResult = []

function updateCartTotal() {
  tempResult = [];
  let tempQty = [];
  let tempInventory = [];

  var anotherarray = [];
  var newarray = [];
  $("input[type='number'").each(function() {
    newarray.push($(this).val());
    tempQty.push($(this).val());
  });
  // console.log(newarray);

  var newCounter = 0;

  var table = document.getElementById("foodTable"),
    rows = table.rows,
    rowcount = rows.length,
    r,
    cells,
    cellcount,
    c,
    cost;
  //getting the cost  
  for (r = 1; r < rowcount; r++) {
    cells = rows[r].cells;
    cellcount = cells.length;
    for (c = 0; c < cellcount; c++) {
      if (c == 0){
        tempInventory.push(cells[c].textContent);
        // console.log(cells[c].textContent)
      }
      if (c == 1){
        tempInventory.push(cells[c].textContent);
        // console.log(cells[c].textContent)
      }
      if (c == 3) {
        cost = cells[c].textContent;
        anotherarray.push(cost);
      }
      if(c == 4){
        tempInventory.push(tempQty[newCounter]);
      }
    }
    newCounter += 1;
  }

  // console.log(tempResult)
  tempResult = tempInventory
  
  let total = 0;
  let counter = 0;
  while (counter < 5) {
    total += newarray[counter] * anotherarray[counter];
    counter += 1;
  }

  // console.log(total);
  document.getElementsByClassName("cart-total-price")[0].innerText = total;
  // document.getElementById("totalprice").innerText = total;

}


// let arrayItems = [];

window.onload = function getInventory() {
  //Update this with TIBCO lrestdoc domain name with the port
  // let serviceURL = "http://fakhruls2017-eval-test.apigee.net/inventory";
  let serviceURL = "http://DESKTOP-OCK7KKR:8082/inventory"; //yazid
  // let serviceURL = "http://One-Punch-Machine:8080/inventory";
  let rows = "";
  fetch(serviceURL)
    .then(res => res.json())
    .then(data => {
      let foodList = data.item;
      if (foodList === undefined) {
        $("#foodTable").empty();
        $("body").append(
          '<div class="text-center">Something went wrong with the data. Please try again later!</div>'
        );
      }

      for (var item = 0; item < foodList.length; item++) {
        eachRow = `
          <td id=\"${foodList[item].itemid}\" name=\"${
          foodList[item].itemid
        }\">${foodList[item].itemid}</td>
          <td id=\"${foodList[item].name}\" name=\"${foodList[item].name}\">${
          foodList[item].name
        }</td>
          <td>${foodList[item].description}</td>
          <td id=\"${foodList[item].cost}\" name=\"${foodList[item].cost}\">${
          foodList[item].cost
        }</td>
          <td><input id='\"${item}\"' class='cart-item-qty' type='number' value='0'></td>`;

        rows += "<tr>" + eachRow + "</tr>";
        // let temp = {
        //   "ItemID": `${foodList[item].itemid}`,
        //   "Name": `${foodList[item].name}`,
        //   "Cost": `${foodList[item].cost}`
        // }
        // arrayItems.push(temp);
      }
      $("#foodTable").append(rows);

      var qty = document.getElementsByClassName("cart-item-qty");
      for (var i = 0; i < qty.length; i++) {
        var input = qty[i];
        input.addEventListener("change", qtyChange);
      }
    })

    .catch(error => {
      $("#foodTable").empty();
      $("body").append(
        '<div class="text-center">Something went wrong with the data. Please try again later!</div>'
      );
    });
};

var stripeHandler = StripeCheckout.configure({
  key: "pk_test_KMXEkQZJ1jzQyMgHcZuxO8Vv",
  locale: "auto",
  token: function(token) {
    let stripeToken = document.getElementById("stripeToken").value;
    stripeToken = token.id;
    let stripeEmail = document.getElementById("stripeEmail").value;
    stripeEmail = token.email;
    let amount = document.getElementsByClassName("cart-total-price")[0]
      .innerText;
    let data = {
      "totalcost": amount,
      "stripid": stripeToken
    };
    fetch("http://DESKTOP-OCK7KKR:8080/payment", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    })
      .then(res => {
        if(res.status == 201){
          console.log(tempResult)
        }
      })
      .catch(error => console.log(error));

    // fetch("http://httpbin.org/post", {
    //   method: "POST",
    //   headers: { "Content-Type": "application/json" },
    //   body: JSON.stringify({})
    // }).catch(error => console.log(error))
  }
})

function purchaseClicked() {
  var price = document.getElementsByClassName("cart-total-price")[0].innerText;
  var cents = Math.floor(price * 100);

  stripeHandler.open({
    amount: cents,
    currency: "sgd"
  });
}

// function stripePay() {
//   var handler = StripeCheckout.configure({
//     key: "pk_test_KMXEkQZJ1jzQyMgHcZuxO8Vv",
//     image: "https://stripe.com/img/documentation/checkout/marketplace.png",
//     locale: "auto",
//     token: function(token) {
//       $("#stripeToken").val(token.id);
//       $("#stripeEmail").val(token.email);
//       $("#amountInCents").val(Math.floor($("#amountInDollars").val() * 100));
//       $("#payForm").submit();
//     }
//   });

//   document
//     .getElementById("customButton")
//     .addEventListener("click", function(e) {
//       var amountInCents = Math.floor($("#amountInDollars").val() * 100);
//       var displayAmount = parseFloat(
//         Math.floor($("#amountInDollars").text() * 100) / 100
//       ).toFixed(2);
//       handler.open({
//         name: "BBQ-Pay",
//         description: "Payment for BBQ Order",
//         currency: "sgd",
//         amount: amountInCents
//       });
//       e.preventDefault();
//     });

//   window.addEventListener("popstate", function() {
//     handler.close();
//   });
// }

// function formSubmit() {
// updateCartTotal();
// fetch("http://httpbin.org/post", {
//   method: "POST",
//   headers: { "Content-Type": "application/json" },
//   body: JSON.stringify(arrayItems)
// }).then(res => res.json());
// }
// }
