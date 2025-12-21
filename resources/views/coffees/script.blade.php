<script>
  const imageInput = document.getElementById("image_url");
  const imagePreview = document.getElementById("image_preview");

  imageInput.addEventListener("change", function () {
    if (this.files && this.files[0]) {
      imagePreview.src = URL.createObjectURL(this.files[0]);
      imagePreview.style.display = "block";
    } else {
      imagePreview.style.display = "none";
    }
  });
</script>
