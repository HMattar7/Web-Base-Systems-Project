function selectItem(item) {
    document.getElementById('selected-item').textContent = item;
  }

  /// layout
function ProductLayout(element) {
  if (element.id == "cardslayout") {
    document.getElementById("layoutcards").classList.remove("HideLayout");
    document.getElementById("cardslayout").classList.add("background-layout");
    document.getElementById("layoutgrid").classList.add("HideLayout");
    document.getElementById("gridlayout").classList.remove("background-layout");
    localStorage.setItem('cardsState', 'visible');
  }else if (element.id == "gridlayout") {
    document.getElementById("layoutgrid").classList.remove("HideLayout");
    document.getElementById("gridlayout").classList.add("background-layout");
    document.getElementById("layoutcards").classList.add("HideLayout");
    document.getElementById("cardslayout").classList.remove("background-layout");
    localStorage.setItem('cardsState', 'hidden');
  }
}
// save
// window.addEventListener('beforeunload', function(event) {
//   localStorage.setItem('cardsState', 'hidden');
// });

/// onload
document.addEventListener('DOMContentLoaded', function() {
  if (localStorage.getItem('cardsState') === 'visible') {
    document.getElementById("layoutcards").classList.remove("HideLayout");
    document.getElementById("cardslayout").classList.add("background-layout");
    document.getElementById("layoutgrid").classList.add("HideLayout");
    document.getElementById("gridlayout").classList.remove("background-layout");
  }else if (localStorage.getItem('cardsState') === 'hidden') {
    document.getElementById("layoutgrid").classList.remove("HideLayout");
    document.getElementById("gridlayout").classList.add("background-layout");
    document.getElementById("layoutcards").classList.add("HideLayout");
    document.getElementById("cardslayout").classList.remove("background-layout");
  }
});

function SortForm() {
  var sortForm = document.getElementById('Sort By');
  sortForm.submit();
}
function GenraForm() {
  var genraForm = document.getElementById('Genra');
  genraForm.submit();
}

function validateRange() {
  var fromInput = document.getElementsByName("From")[0];
  var toInput = document.getElementsByName("To")[0];
  console.log(fromInput.value, toInput.value);
  if (fromInput.value !== "" && toInput.value !== "" && parseInt(fromInput.value) >= parseInt(toInput.value)) {
    alert("From value should be smaller than To value");
    fromInput.value = "From";
    toInput.value = "To";
  }
}