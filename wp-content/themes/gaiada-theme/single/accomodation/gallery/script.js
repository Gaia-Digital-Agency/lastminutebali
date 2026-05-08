document.addEventListener("DOMContentLoaded", function () {
	var galleryModal = document.getElementById("galleryModal");
	galleryModal.addEventListener("show.bs.modal", function (event) {
		var trigger = event.relatedTarget;
		var imageUrl = trigger.getAttribute("data-bs-image");
		var modalImage = galleryModal.querySelector("#modalImage");
		modalImage.src = imageUrl;
	});
});
