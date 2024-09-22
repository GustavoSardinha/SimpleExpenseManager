function eye(num)
{
    var open = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABrklEQVRIie3WP2sVQRSG8d8GEhG9UTt7g41FTLCxt7AQrcTCVizF3mijyBUECX4DLRSDYCFoYWewSVRS2NmukNgoIsQma7Fz5TLO7B+8dveFU+zue54zM2d2dplqqv+koof3FC7gNE7gcLj/DZ/wDi/wYVKDO4/3qDrGBs79S8HjeNWjYBwvsdC36CX8TMC2cQMncSDEElbCs9j/Axe7FCxwF3sJyDMMGnIHWEvk7eGOhv1U4GEicVS0y0YsMsUrrOYY9zMJ25pnGmseOxnWvdh8NWOs1D0d11wAfEGJYbg3rpsNvCsj0yJ2G4yLEXSY8Awjz1IDb3fE3GwwVf5e5jLhKSPPoIW5OYNZk1fbRpydwfUwipyORdePE55HLTnjqnBtdLEqvywrUeKcuqel/Oa61cB7EMPWM8a+r9MhfM2w3kq09gi2Mglruh8gzzOMrVAjqaPqr0uu+HzLTHNFNwK7UfvxNAPYUR8OyzgYYlnd09zyPgnMTipwWfqd7RplYPT52fijgfrLkptNblVua9mQXUezD2dwVn0cLqh7Ct/xGR/xGm/wqyN3qqkmr98Yh/1ZwqXF1gAAAABJRU5ErkJggg==";
    var closed = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABbElEQVRIie3VsUocURTG8Z/RXhJSJKaws4iChWmWVSGYOoVdGkkliG9gXsBqnyOQhdSpgpsoKtrFMooQBJt0ksK4Wuy5Og66O6u7i8h+8DFw5p7zP3Pv4Q599fXYNNDG2lF8wDu8xrOI/8UeaviKX51qbgZrqOO8gGso3wf4El8KwvKu4zNetAudxdEdoVkfY64o9CNOOwBNPsVCK+iS4mfZjs+weBv0Pf53AZqFz+eh4zjpIjT5BBNZ8E4PoMm78CTAQzftfZd0jVXS2UluNuGlfCcrPQB/ykOf4mcPwNt4ngVvxYsDVLsArEbtBL/Ud43JfqXxx6p0EFqJmiPBqHE1YW9zWz8cz7qryW9XKXc4GjjCm2YJU5H0D5NYxmGBL0s+jJzJqFGPmi01ht+RnLQaRXfwDfsZ0H7E0iW0mslbjlpjRcA3KQ3GdCaWwEnlTCMtVfTG+qNxRutN1mxgE4MFa95ZP8SE9vWgdQGKGFg3UeGEGwAAAABJRU5ErkJggg==";
    if($(".eye")[num].src == closed){
        $(".eye")[num].src = open;
        $(".pass")[num].type = "text";
    }else{
        $(".eye")[num].src = closed;
        $(".pass")[num].type = "password";
    }
}
