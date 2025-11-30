document.getElementById('search').addEventListener('input', function () {
  const val = this.value.toLowerCase();
  document.querySelectorAll('#table-body tr').forEach(tr => {
    tr.style.display = tr.innerText.toLowerCase().includes(val) ? '' : 'none';
  });
});