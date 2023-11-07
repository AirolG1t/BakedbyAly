const myCarouselElement = document.querySelector('#carouselExampleIndicators');    
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
const carousel = new bootstrap.Carousel(myCarouselElement, {
  interval: 2000,
  touch: false
});  

    const originalListContent = document.querySelector('.left ul').innerHTML;
    let currentImage = 'redImage';

    function switchImage(imageId, size) {
        currentImage = imageId;
        console.log('Selected size:', size);
    }

    document.querySelectorAll('.draggable-list').forEach(list => {
        list.addEventListener('dragstart', (e) => {
            const draggedItemId = e.target.id;
            console.log('Drag started with ID:', draggedItemId);
            e.dataTransfer.setData('text/plain', draggedItemId);
        });
    });

    function allowDrop(event) {
        event.preventDefault();
        document.getElementById(currentImage).classList.add('dragover');
    }

    function dragLeave(event) {
        document.getElementById(currentImage).classList.remove('dragover');
    }

    function drop(event) {
        event.preventDefault();
        document.getElementById(currentImage).classList.remove('dragover');
        const data = event.dataTransfer.getData('text');
        const droppedList = document.createElement('div');

        const selectedRadioValue = document.querySelector('input[name="select"]:checked').value;
        console.log('Selected radio value:', selectedRadioValue);
        console.log('Dropped data:', data);

        // Add your filter change logic here    
        if (data === 'color1') {
            document.getElementById(currentImage).style.filter = 'brightness(0) saturate(100%) invert(23%) sepia(5%) saturate(232%) hue-rotate(227deg) brightness(92%) contrast(88%)';
        } else if (data === 'color2') {
            document.getElementById(currentImage).style.filter = 'brightness(0) saturate(100%) invert(77%) sepia(80%) saturate(3024%) hue-rotate(75deg) brightness(103%) contrast(104%)';
        } else if (data === 'color3') {
            document.getElementById(currentImage).style.filter = 'brightness(0) saturate(100%) invert(40%) sepia(12%) saturate(2921%) hue-rotate(255deg) brightness(99%) contrast(83%)';
        } else if (data === 'color4') {
            document.getElementById(currentImage).style.filter = 'brightness(0) saturate(100%) invert(84%) sepia(38%) saturate(593%) hue-rotate(303deg) brightness(97%) contrast(103%)';
        }else if (data === 'color5'){
            document.getElementById(currentImage).style.filter = 'brightness(0) saturate(100%) invert(43%) sepia(16%) saturate(843%) hue-rotate(354deg) brightness(85%) contrast(83%)';
        }else if (data === 'color6'){
            document.getElementById(currentImage).style.filter = 'brightness(0) saturate(100%) invert(57%) sepia(61%) saturate(1222%) hue-rotate(195deg) brightness(104%) contrast(114%)'
        }
        else if (data === 'color7'){
            document.getElementById(currentImage).style.filter = 'brightness(0) saturate(100%) invert(99%) sepia(0%) saturate(460%) hue-rotate(6deg) brightness(118%) contrast(87%)'
        }
        else if(data === 'color8'){
            document.getElementById(currentImage).style.filter = "brightness(0) saturate(100%) invert(79%) sepia(12%) saturate(472%) hue-rotate(328deg) brightness(111%) contrast(84%)";
        }
        // Append the dropped list to the image container
        document.getElementById(currentImage).appendChild(droppedList);
    }

    function resetFilter() {
        document.getElementById(currentImage).style.filter = '';
        document.querySelector('.left ul').innerHTML = originalListContent;
        document.querySelectorAll('.draggable-list').forEach(list => {
            list.addEventListener('dragstart', (e) => {
                const draggedItemId = e.target.id;
                console.log('Drag started with ID:', draggedItemId);
                e.dataTransfer.setData('text/plain', draggedItemId);
            });
        });
    }
    
    //top draggablle stickers
        const draggableTopElements = document.querySelectorAll('.draggableTop');
        const topSticker = document.querySelector('.top-sticker');
        const topSticker2 = document.querySelector('.topSticker2');
        const resetButton = document.getElementById('resetSticker');

        const originalTopListContent = document.querySelector('.sticker .topList').innerHTML;
        const originaltopSticker2Content = document.querySelector('.topSticker2').innerHTML; 

        draggableTopElements.forEach(element => {
            element.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('text/plain', e.target.id);
                topSticker.style.display = 'flex';
                topSticker2.style.display = 'flex';
            });
        });

        topSticker.addEventListener('dragover', (e) => {
            e.preventDefault();
        });
        topSticker2.addEventListener('dragover', (e) => {
            e.preventDefault();
        });

        topSticker.addEventListener('dragenter', () => {
            topSticker.style.backgroundColor = '#e0e0e0';
        });
        topSticker2.addEventListener('dragenter', () => {
            topSticker2.style.backgroundColor = '#e0e0e0';
        });

        topSticker.addEventListener('dragleave', () => {
            topSticker.style.backgroundColor = 'transparent';
        });
        topSticker2.addEventListener('dragleave', () => {
            topSticker2.style.backgroundColor = 'transparent';
        });

        topSticker.addEventListener('drop', (e) => {
        e.preventDefault();
        topSticker.style.backgroundColor = 'transparent';
        const draggedElementId = e.dataTransfer.getData('text/plain');
        if(draggedElementId === 'top1' || draggedElementId === 'top2' || draggedElementId === 'top3' || draggedElementId === 'top4' || draggedElementId === 'top5'|| draggedElementId === 'top6'|| draggedElementId === 'top7'){
            const draggedElement = document.getElementById(draggedElementId); 
            while (topSticker.firstChild) {
                topSticker.removeChild(topSticker.firstChild);
            }
            // Add the new dragged element
            topSticker.appendChild(draggedElement);
            draggedElement.style.width = '100%';
            draggedElement.style.height = '100% ';
            draggedElement.style.borderRadius = 'none';
            console.log('Dropped element ID:', draggedElementId);
        }else{
            document.querySelector('.topList').innerHTML = originalTopListContent;
            topSticker.innerHTML = '';
            const resetDraggableTopElements = document.querySelectorAll('.draggableTop');
            resetDraggableTopElements.forEach(element => {
                element.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', e.target.id);
                    topSticker.style.display = 'flex'; 
                });
            });
        }
        });
        topSticker2.addEventListener('drop', (e) => {
            e.preventDefault();
            topSticker2.style.backgroundColor = 'transparent';
            const draggedElementId = e.dataTransfer.getData('text/plain');
            if(draggedElementId === 'top1' || draggedElementId === 'top2' || draggedElementId === 'top3' || draggedElementId === 'top4' || draggedElementId === 'top5'|| draggedElementId === 'top6'|| draggedElementId === 'top7'){
                const draggedElement = document.getElementById(draggedElementId); 
                while (topSticker2.firstChild) {
                    topSticker2.removeChild(topSticker2.firstChild);
                }
                // Add the new dragged element
                topSticker2.appendChild(draggedElement);
                draggedElement.style.width = '100%';
                draggedElement.style.height = '100% ';
                draggedElement.style.borderRadius = 'none';
                console.log('Dropped element ID:', draggedElementId);
            }else{
                document.querySelector('.topList').innerHTML = originalTopListContent;
                topSticker2.innerHTML = '';
                const resetDraggableTopElements = document.querySelectorAll('.draggableTop');
                resetDraggableTopElements.forEach(element => {
                    element.addEventListener('dragstart', (e) => {
                        e.dataTransfer.setData('text/plain', e.target.id);
                        topSticker2.style.display = 'flex'; 
                    });
                });
            }
        });

    //middleSticker
    const draggableMiddeElements = document.querySelectorAll('.draggableMid');
    const middleSticker = document.querySelector('.middleSticker');
    const middleSticker1 = document.querySelector('.middleSticker1');
    const middleSticker2 = document.querySelector('.middleSticker2');

    const originalMiddleListContent = document.querySelector('.sticker .middleList').innerHTML;
    const originalmiddleSticker1Content = document.querySelector('.middleSticker1').innerHTML; 
    const originalmiddleSticker2Content = document.querySelector('.middleSticker2').innerHTML; 

    draggableMiddeElements.forEach(element => {
        element.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text/plain', e.target.id);
            middleSticker.style.display = 'flex';
            middleSticker1.style.display = 'flex';
            middleSticker2.style.display = 'flex';
        });
    });

    middleSticker.addEventListener('dragover', (e) => {
        e.preventDefault();
    });
    middleSticker1.addEventListener('dragover', (e) => {
        e.preventDefault();
    });
    middleSticker2.addEventListener('dragover', (e) => {
        e.preventDefault();
    });

    middleSticker.addEventListener('dragenter', () => {
        middleSticker.style.backgroundColor = '#e0e0e0';
    });
    middleSticker1.addEventListener('dragenter', () => {
        middleSticker1.style.backgroundColor = '#e0e0e0';
    });
    middleSticker2.addEventListener('dragenter', () => {
        middleSticker2.style.backgroundColor = '#e0e0e0';
    });

    middleSticker.addEventListener('dragleave', () => {
        middleSticker.style.backgroundColor = 'transparent';
    });
    middleSticker1.addEventListener('dragleave', () => {
        middleSticker1.style.backgroundColor = 'transparent';
    });
    middleSticker2.addEventListener('dragleave', () => {
        middleSticker2.style.backgroundColor = 'transparent';
    });

    middleSticker1.addEventListener('drop', (e) => {
        e.preventDefault();
        middleSticker1.style.backgroundColor = 'transparent';
        const draggedElementId = e.dataTransfer.getData('text/plain');
        if (draggedElementId === 'top1' || draggedElementId === 'top2' || draggedElementId === 'top3' || draggedElementId === 'top4' || draggedElementId === 'top5'|| draggedElementId === 'top6'|| draggedElementId === 'top7') {
            const draggedElement = document.getElementById(draggedElementId);
    
            // Remove the current child element from middleSticker
            while (middleSticker1.firstChild) {
                middleSticker1.removeChild(middleSticker1.firstChild);
            }
    
            // Add the new dragged element to middleSticker
            middleSticker1.appendChild(draggedElement);
            draggedElement.style.width = '100%';
            draggedElement.style.height = '100%';
            draggedElement.style.borderRadius = 'none';
            console.log('Dropped element ID:', draggedElementId);
        } else {
            document.querySelector('.topList').innerHTML = originalMiddleListContent;
            middleSticker1.innerHTML = '';

            const resetDraggableMidElements = document.querySelectorAll('.draggableTop');
            resetDraggableMidElements.forEach(element => {
                element.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', e.target.id);
                    middleSticker1.style.display = 'block';
                });
            });
        }
    });
    middleSticker.addEventListener('drop', (e) => {
        e.preventDefault();
        middleSticker.style.backgroundColor = 'transparent';
        const draggedElementId = e.dataTransfer.getData('text/plain');
        if (draggedElementId === 'mid1' || draggedElementId === 'mid2' || draggedElementId === 'mid3' || draggedElementId === 'mid4' || draggedElementId === 'mid5' || draggedElementId === 'mid6' || draggedElementId === 'mid7') {
            const draggedElement = document.getElementById(draggedElementId);
    
            // Remove the current child element from middleSticker
            while (middleSticker.firstChild) {
                middleSticker.removeChild(middleSticker.firstChild);
            }
    
            // Add the new dragged element to middleSticker
            middleSticker.appendChild(draggedElement);
            draggedElement.style.width = '100%';
            draggedElement.style.height = '100%';
            draggedElement.style.borderRadius = 'none';
            console.log('Dropped element ID:', draggedElementId);
        } else {
            document.querySelector('.middleList').innerHTML = originalMiddleListContent;
            middleSticker.innerHTML = '';

            const resetDraggableMidElements = document.querySelectorAll('.draggableMid');
            resetDraggableMidElements.forEach(element => {
                element.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', e.target.id);
                    middleSticker.style.display = 'flex';
                });
            });
        }
    });

    middleSticker2.addEventListener('drop', (e) => {
        e.preventDefault();
        middleSticker2.style.backgroundColor = 'transparent';
        const draggedElementId = e.dataTransfer.getData('text/plain');
        if (draggedElementId === 'mid1' || draggedElementId === 'mid2' || draggedElementId === 'mid3' || draggedElementId === 'mid4' || draggedElementId === 'mid5' || draggedElementId === 'mid6' || draggedElementId === 'mid7') {
            const draggedElement = document.getElementById(draggedElementId);
    
            // Remove the current child element from middleSticker
            while (middleSticker2.firstChild) {
                middleSticker2.removeChild(middleSticker2.firstChild);
            }
    
            // Add the new dragged element to middleSticker
            middleSticker2.appendChild(draggedElement);
            draggedElement.style.width = '100%';
            draggedElement.style.height = '100%';
            draggedElement.style.borderRadius = 'none';
            console.log('Dropped element ID:', draggedElementId);
        } else {
            document.querySelector('.middleList').innerHTML = originalMiddleListContent;
            middleSticker.innerHTML = '';

            const resetDraggableMidElements = document.querySelectorAll('.draggableMid');
            resetDraggableMidElements.forEach(element => {
                element.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', e.target.id);
                    middleSticker.style.display = 'flex';
                });
            });
        }
    });

        resetButton.addEventListener('click', () => {
            document.querySelector('.topList').innerHTML = originalTopListContent;
            topSticker.innerHTML = '';
            topSticker2.innerHTML = '';
            const resetDraggableTopElements = document.querySelectorAll('.draggableTop');
            resetDraggableTopElements.forEach(element => {
                element.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', e.target.id);
                    topSticker.style.display = 'flex'; 
                });
            });

            const resetDraggableTopStickerElements = document.querySelectorAll('.draggableTop');
            resetDraggableTopStickerElements.forEach(element => {
                element.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', e.target.id);
                    topSticker2.style.display = 'flex'; 
                });
            });

            document.querySelector('.middleList').innerHTML = originalMiddleListContent;
            middleSticker.innerHTML = '';
            middleSticker1.innerHTML = '';
            middleSticker2.innerHTML = '';

            const resetDraggableMidElements = document.querySelectorAll('.draggableMid');
            resetDraggableMidElements.forEach(element => {
                element.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', e.target.id);
                    middleSticker.style.display = 'flex';
                });
            });
            const resetDraggableTopStickerElements2 = document.querySelectorAll('.draggableTop');
            resetDraggableTopStickerElements2.forEach(element => {
                element.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', e.target.id);
                    middleSticker1.style.display = 'flex';
                });
            });
            const resetDraggableMidElements2 = document.querySelectorAll('.draggableMid');
            resetDraggableMidElements2.forEach(element => {
                element.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', e.target.id);
                    middleSticker2.style.display = 'flex';
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const leftDiv = document.querySelector(".left");
            const left2Div = document.querySelector(".left2");
            const nextButton = document.getElementById("nextButton");
            const backButton = document.querySelector(".cancelBTN");
        
            const topSticker = document.querySelector('.top-sticker');
            const middleSticker = document.querySelector('.middleSticker');
            const middleSticker1 = document.querySelector('.middleSticker1');
            const topSticker2 = document.querySelector('.topSticker2');
            const middleSticker2 = document.querySelector('.middleSticker2');
        
            nextButton.addEventListener("click", function() {
                leftDiv.style.display = "none";
                left2Div.style.display = "flex";
        
                const selectedSize = document.querySelector('.btn1.active') ? 'Small' : 'Large';
                if(selectedSize === 'Small'){
                    topSticker.style.display = 'flex';
                    middleSticker.style.display = 'flex';
                }else{
                    topSticker2.style.display = 'flex';
                    middleSticker2.style.display = 'flex';
                    middleSticker1.style.display = 'flex';
                }
            });
        
            backButton.addEventListener("click", function() {
                leftDiv.style.display = "flex";
                left2Div.style.display = "none";
                topSticker.style.display = 'none';
                middleSticker.style.display = 'none';
                topSticker2.style.display = 'none';
                middleSticker2.style.display = 'none';
            });
        });
        
        
        