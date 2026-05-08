document.addEventListener('DOMContentLoaded', function () {
	const header = document.querySelector('.site-header');
	const hamburgerToggle = document.getElementById('hamburger-toggle');
	const closeMobileMenu = document.getElementById('close-mobile-menu');
	const mobileMenuModal = document.getElementById('mobile-menu-modal');
	const body = document.body;

	// Scroll event for sticky header
	window.addEventListener('scroll', function () {
		if (window.scrollY > 50) {
			header.classList.add('is-scrolled');
		} else {
			header.classList.remove('is-scrolled');
		}
	});

	if (!mobileMenuModal) return;

	const mobileMenuOverlay = mobileMenuModal.querySelector('.mobile-menu-overlay');

	function openMenu() {
		mobileMenuModal.classList.add('is-active');
		body.classList.add('mobile-menu-open');
		if (hamburgerToggle) {
			hamburgerToggle.setAttribute('aria-expanded', 'true');
		}
	}

	function closeMenu() {
		mobileMenuModal.classList.remove('is-active');
		body.classList.remove('mobile-menu-open');
		if (hamburgerToggle) {
			hamburgerToggle.setAttribute('aria-expanded', 'false');
		}
	}

	if (hamburgerToggle) {
		hamburgerToggle.addEventListener('click', openMenu);
	}

	if (closeMobileMenu) {
		closeMobileMenu.addEventListener('click', closeMenu);
	}

	if (mobileMenuOverlay) {
		mobileMenuOverlay.addEventListener('click', closeMenu);
	}

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && mobileMenuModal.classList.contains('is-active')) {
			closeMenu();
		}
	});

	// Close menu when clicking on a link
	const mobileLinks = mobileMenuModal.querySelectorAll('.mobile-menu-link, .btn');
	mobileLinks.forEach(link => {
		link.addEventListener('click', closeMenu);
	});
});
