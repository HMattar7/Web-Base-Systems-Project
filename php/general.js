function selectItem(item) {
    document.getElementById('selected-item').textContent = item;
  }

function ProductLayout(element) {
  if (element.id == "cardslayout") {
    document.getElementById("layoutcards").classList.remove("HideLayout");
    document.getElementById("layoutgrid").classList.add("HideLayout");
  }else if (element.id == "gridlayout") {
    document.getElementById("layoutgrid").classList.remove("HideLayout");
    document.getElementById("layoutcards").classList.add("HideLayout");
  }
}