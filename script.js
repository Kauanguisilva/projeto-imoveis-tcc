const btnAlugar = document.querySelector(".btnAlugar");
const btnComprar = document.querySelector(".btnComprar");
const divAlugar = document.querySelector(".Alugar");
const divComprar = document.querySelector(".Comprar");
const searchInput = document.getElementById("endereco");

// Alternar abas
function ExibirAlugar() {
    btnAlugar.classList.add("ativada");
    btnComprar.classList.remove("ativada");
    divAlugar.style.display = "block";
    divComprar.style.display = "none";
    filtrarCards();
}

function ExibirComprar() {
    btnAlugar.classList.remove("ativada");
    btnComprar.classList.add("ativada");
    divAlugar.style.display = "none";
    divComprar.style.display = "block";
    filtrarCards();
}

if(btnAlugar) btnAlugar.addEventListener("click", ExibirAlugar);
if(btnComprar) btnComprar.addEventListener("click", ExibirComprar);

// Filtrar cards por endereço
function filtrarCards() {
    const searchTerm = searchInput.value.toLowerCase();

    // Só filtra se tiver mais de 4 caracteres
    if(searchTerm.length < 4) {
        mostrarTodos();
        return;
    }

    const container = divAlugar.style.display === "block" ? divAlugar : divComprar;
    const cards = container.querySelectorAll(".CardPropriedade");

    cards.forEach(card => {
        const endereco = card.querySelector(".Endereco").textContent.toLowerCase();
        card.style.display = endereco.includes(searchTerm) ? "block" : "none";
    });
}

// Mostrar todos os cards quando input < 4 caracteres
function mostrarTodos() {
    [divAlugar, divComprar].forEach(container => {
        if(container) {
            const cards = container.querySelectorAll(".CardPropriedade");
            cards.forEach(card => card.style.display = "block");
        }
    });
}

// Filtrar enquanto digita
if(searchInput){
    searchInput.addEventListener("input", filtrarCards);
}

// // Inicializa mostrando Alugar
// ExibirAlugar();
