let slider = document.getElementById('slider');
let images = slider.querySelectorAll('img');
let allImages = [...images];

let prev = document.getElementById('prev');
let next = document.getElementById('next');

function display(images) {
  allImages = [...images];
  slider.innerHTML = "";

  allImages.forEach(img => { 
    let image = document.createElement('img');
    image.src = img.src;

    slider.appendChild(image);
  });

}

prev.addEventListener('click', (e) => {
  e.preventDefault();
  let poped = allImages.pop();
  let newImages = [poped, ...allImages];

  display(newImages)
});


next.addEventListener('click', (e) => {
  e.preventDefault();
  let shifted = allImages.shift();
  let newImages = [...allImages, shifted];

  display(newImages)
});

display(images);
