var treeData = [
    {
        name: "Empresa",
        tipo: "null",
        image: "null",
        parent: "null"
    }
];
var treeData2 = [
    {
        name: "Empresa",
        tipo: "null",
        image: "null",
        parent: "null"
    }
];
var colores = ["#FFCC33", "#FF9933", "#E36B2C", "#66CC00"];
var hijoderecha;
var valorderecha;

$(document).ready(function() {
    //
    console.log(arregloizquierda);
    if (arregloizquierda.length != 0) {
        treeData2[0].children = arregloizquierda;
    }
    if (arregloderecha.length != 0) {
        treeData[0].children = arregloderecha;
    }
    console.log(treeData);

    //
    var html = "";
    proveedores.forEach((value, index, array) => {
        html =
            html +
            "<option value='" +
            value.proveedor +
            "' data-image='" +
            value.ruta_logo +
            "'>" +
            value.proveedor +
            "</option>";
    });
    $("#name_derecha").html(html);
    $("#name_izquierda").html(html);

    let box = document.getElementById("contener_cade");
    (width = box.clientWidth), (height = box.clientHeight);

    var i = 0,
        duration = 750,
        root;

    var tree = d3.layout.tree().size([height, width]);

    var diagonal = d3.svg.diagonal().projection(function(d) {
        return [d.y, d.x];
    });
    treeData[0].name = empresa;
    treeData2[0].name = empresa;

    var svg = d3
        .select("#contener_cade")
        .append("svg")
        .attr("width", width)
        .attr("height", height);
    /* .attr("class", "overlay")
        .call(d3.behavior.zoom()
        .scaleExtent([0.5, 5])
        .on("zoom", zoom));*/

    makeRightTree();
    makeLeftTree();
});
function zoom() {
    let box = document.getElementById("contener_cade");
    (width = box.clientWidth), (height = box.clientHeight);
    var scale = d3.event.scale,
        translation = d3.event.translate,
        tbound = -height * scale,
        bbound = height * scale,
        lbound = -width * scale,
        rbound = width * scale;
    // limit translation to thresholds
    translation = [
        Math.max(Math.min(translation[0], rbound), lbound),
        Math.max(Math.min(translation[1], bbound), tbound)
    ];
    d3.select("#contener_cade")
        .select("svg")
        .attr(
            "transform",
            "translate(" + translation + ")" + " scale(" + scale + ")"
        );
}
$("#tipo_derecha").on("change", function() {
    var html = "";
    if ($("#tipo_derecha").val() == "PROVEEDOR") {
        proveedores.forEach((value, index, array) => {
            html =
                html +
                "<option value='" +
                value.proveedor +
                "' data-image='" +
                value.ruta_logo +
                "'>" +
                value.proveedor +
                "</option>";
        });
    } else {
        clientes.forEach((value, index, array) => {
            html =
                html +
                "<option value='" +
                value.cliente +
                "' data-image='" +
                value.ruta_logo +
                "' >" +
                value.cliente +
                "</option>";
        });
    }

    $("#name_derecha").html(html);
});

function makeRightTree() {
    // ************** Generate the tree diagram  *****************

    let box = document.getElementById("contener_cade");
    (width = box.clientWidth), (height = box.clientHeight);

    var i = 0,
        duration = 750,
        root;

    var tree = d3.layout.tree().size([height, width]);

    var diagonal = d3.svg.diagonal().projection(function(d) {
        return [d.y, d.x];
    });

    var svg = d3
        .select("svg")
        .append("g")
        .attr("transform", "translate(800,0)");

    root = treeData[0];
    oldrx = root.x0 = 300;
    oldry = root.y0 = 0;

    updatederecha(root);

    function updatederecha(source) {
        // Compute the new tree layout.
        var nodes = tree.nodes(root).reverse(),
            links = tree.links(nodes);

        // Normalize for fixed-depth.
        nodes.forEach(function(d) {
            d.y = d.depth * 300;
        });

        // Update the nodes…
        var node = svg.selectAll("g.node").data(nodes, function(d) {
            return d.id || (d.id = ++i);
        });

        // Enter any new nodes at the parent's previous position.
        var nodeEnter = node
            .enter()
            .append("g")
            .attr("class", function(d) {
                if (d.tipo == "null") {
                    valorderecha = d;
                    return "node rightparent"; //since its root its parent is null
                } else return "node rightchild"; //all nodes with parent will have this class
            })
            .attr("transform", function(d) {
                return "translate(" + source.y0 + "," + source.x0 + ")";
            })
            .on("click", click_derecha);

        nodeEnter
            .append("rect")
            .attr("x", "-100")
            .attr("y", "-40")
            .attr("height", 50)
            .attr("width", 200)
            .attr("rx", 15)
            .attr("ry", 15)
            .style("fill", function(d) {
                var rn = Math.floor(Math.random() * colores.length);
                return colores[rn];
            });

        nodeEnter
            .append("text")
            .attr("x", function(d) {
                if (d.tipo != "null") {
                    return -90;
                }
            })
            .attr("y", function(d) {
                if (d.tipo != "null") {
                    return -30;
                }
            })
            .attr("dy", ".35em")
            .text(function(d) {
                if (d.tipo != "null") {
                    return d.tipo;
                }
            })
            .attr("fill", "white");

        //hijo nombre
        nodeEnter
            .append("text")
            .attr("x", function(d) {
                if (d.tipo != "null") {
                    return -80;
                }
            })
            .attr("y", function(d) {
                if (d.tipo != "null") {
                    return -17;
                }
            })
            .attr("dy", ".35em")
            .attr("fill", "white")
            .text(function(d) {
                if (d.tipo != "null") {
                    return d.name;
                }
            });

        nodeEnter
            .append("image")
            .attr("href", function(d) {
                if (d.tipo == "PROVEEDOR") {
                    return (
                        "http://127.0.0.1:8000/storage/" +
                        d.image.replace("public/", "")
                    );
                }
            })
            .attr("height", 60)
            .attr("width", 60)
            .attr("x", "65")
            .attr("y", "-85");

        //button +
        var addRightChild = nodeEnter.append("g");
        addRightChild
            .append("rect")
            .attr("x", function(d) {
                if (d.tipo == "null") {
                    return "100";
                } else {
                    return "100";
                }
            })
            .attr("y", function(d) {
                if (d.tipo == "null") {
                    return "-10";
                } else {
                    return "-25";
                }
            })
            .attr("height", 20)
            .attr("width", 20)
            .attr("rx", 10)
            .attr("ry", 10)
            .style("stroke", "#444")
            .style("stroke-width", "2")
            .style("fill", "#ccc");

        addRightChild
            .append("line")
            .attr("x1", function(d) {
                if (d.tipo == "null") {
                    return "105";
                } else {
                    return "111";
                }
            })
            .attr("y1", function(d) {
                if (d.tipo == "null") {
                    return "1";
                } else {
                    return "-22";
                }
            })
            .attr("x2", function(d) {
                if (d.tipo == "null") {
                    return "115";
                } else {
                    return "111";
                }
            })
            .attr("y2", function(d) {
                if (d.tipo == "null") {
                    return "1";
                } else {
                    return "-10";
                }
            })
            .attr("stroke", "#444")
            .style("stroke-width", "2");

        addRightChild
            .append("line")
            .attr("x1", function(d) {
                if (d.tipo == "null") {
                    return "110";
                } else {
                    return "105";
                }
            })
            .attr("y1", function(d) {
                if (d.tipo == "null") {
                    return "-4";
                } else {
                    return "-16";
                }
            })
            .attr("x2", function(d) {
                if (d.tipo == "null") {
                    return "110";
                } else {
                    return "116";
                }
            })
            .attr("y2", function(d) {
                if (d.tipo == "null") {
                    return "6";
                } else {
                    return "-16";
                }
            })
            .attr("stroke", "#444")
            .style("stroke-width", "2");

        // Transition nodes to their new position.
        var nodeUpdate = node
            .transition()
            .duration(duration)
            .attr("transform", function(d) {
                if (d.tipo == "null") {
                    d.y = oldry;
                    d.x = oldrx;
                }

                return "translate(" + d.y + "," + d.x + ")";
            });

        nodeUpdate
            .select("circle")
            .attr("r", 10)
            .style("fill", function(d) {
                return d._children ? "lightsteelblue" : "#fff";
            });

        nodeUpdate.select("text").style("fill-opacity", 1);

        // Transition exiting nodes to the parent's new position.
        var nodeExit = node
            .exit()
            .transition()
            .duration(duration)
            .attr("transform", function(d) {
                return "translate(" + source.y + "," + source.x + ")";
            })
            .remove();

        nodeExit.select("circle").attr("r", 1e-6);

        nodeExit.select("text").style("fill-opacity", 1e-6);

        // Update the links…
        var link = svg.selectAll("path.link").data(links, function(d) {
            return d.target.id;
        });

        // Enter any new links at the parent's previous position.
        link.enter()
            .insert("path", "g")
            .attr("class", "link")
            .attr("d", function(d) {
                var o = {
                    x: source.x0,
                    y: source.y0
                };
                return diagonal({
                    source: o,
                    target: o
                });
            });
        //.on("click", removelink);

        function removelink(d) {
            //this is the links target node which you want to remove
            var target = d.target;
            //make new set of children
            var children = [];
            //iterate through the children
            target.parent.children.forEach(function(child) {
                if (child.id != target.id) {
                    //add to teh child list if target id is not same
                    //so that the node target is removed.
                    children.push(child);
                }
            });
            //set the target parent with new set of children sans the one which is removed
            target.parent.children = children;
            //redraw the parent since one of its children is removed
            updatederecha(d.target.parent);
        }

        // Transition links to their new position.
        link.transition()
            .duration(duration)
            .attr("d", diagonal);

        // Transition exiting nodes to the parent's new position.
        link.exit()
            .transition()
            .duration(duration)
            .attr("d", function(d) {
                var o = {
                    x: source.x,
                    y: source.y
                };
                return diagonal({
                    source: o,
                    target: o
                });
            })
            .remove();

        // Stash the old positions for transition.
        nodes.forEach(function(d) {
            d.x0 = d.x;
            d.y0 = d.y;
        });

        //--------------derecha-------
        addRightChild.on("click", function(d) {
            event.stopPropagation();
            $("#modalderecha").modal("show");
            $("#btnsave_derecha").off("click");
            $("#btnsave_derecha").on("click", function() {
                var childname = $("#name_derecha").val();
                var tipochildname = $("#tipo_derecha").val();
                var image = $("#name_derecha")
                    .children("option:selected")
                    .data("image");

                if (typeof d.children === "undefined") {
                    var newChild = [
                        {
                            name: childname,
                            parent: d.name,
                            tipo: tipochildname,
                            image: image
                        }
                    ];
                    var newnodes = tree.nodes(newChild);
                    d.children = newnodes[0];
                    updatederecha(d);
                } else {
                    var newChild = {
                        name: childname,
                        parent: d.name,
                        tipo: tipochildname,
                        image: image
                    };
                    d.children.push(newChild);
                    updatederecha(d);
                }
                $("#modalderecha").modal("hide");
            });
        });
    }
    // Toggle children on click.
    function click_derecha(d) {
        Swal.fire({
            title: "¿Estas seguro?",
            text: "Esta seguro de eliminar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "¡Si, eliminar!",
            cancelButtonText: "Cancelar"
        }).then(result => {
            if (result.isConfirmed) {
                var id = d.id;
                var padre = d.parent;
                var hijos = padre.children.filter(function(hijo) {
                    return hijo.id !== id;
                });

                padre.children = hijos;
                updatederecha(d);
            }
        });
        // console.log(d);
        // if (d.children) {
        //  d._children = d.children;
        //  d.children = null;
        // } else {
        //  d.children = d._children;
        //  d._children = null;
        // }
        // update(d);
    }
}

function makeLeftTree() {
    // ************** Generate the tree diagram  *****************
    var margin = {
            top: 0,
            right: 120,
            bottom: 0,
            left: 120
        },
        width = 1260 - margin.right - margin.left,
        height = 500 - margin.top - margin.bottom;

    var i = 0,
        duration = 750,
        root;

    var tree = d3.layout.tree().size([height, width]);

    var diagonal = d3.svg.diagonal().projection(function(d) {
        return [d.y, d.x];
    });

    var svg = d3
        .select("svg")
        .append("g")
        .attr("transform", "translate(-221,50)");

    root = treeData2[0];
    oldlx = root.x0 = height / 2;
    oldly = root.y0 = width;

    update(root);

    function update(source) {
        // Compute the new tree layout.
        var nodes = tree.nodes(root).reverse(),
            links = tree.links(nodes);

        // Normalize for fixed-depth.
        nodes.forEach(function(d) {
            d.y = width - d.depth * 300;
        });

        // Update the nodes…
        var node = svg.selectAll("g.node").data(nodes, function(d) {
            return d.id || (d.id = ++i);
        });

        // Enter any new nodes at the parent's previous position.
        var nodeEnter = node
            .enter()
            .append("g")
            .attr("class", function(d) {
                if (d.tipo == "null") {
                    return "node leftparent"; //since its root its parent is null
                } else return "node leftchild"; //all nodes with parent will have this class
            })
            .attr("transform", function(d) {
                return "translate(" + source.y0 + "," + source.x0 + ")";
            })
            .on("click", click);

        nodeEnter
            .append("rect")
            .attr("x", "-100")
            .attr("y", "-25")
            .attr("height", 50)
            .attr("width", 200)
            .attr("rx", 15)
            .attr("ry", 15)
            .style("stroke", "#444")
            .style("stroke-width", "0")
            .style("fill", function(d) {
                if (d.tipo != "null") {
                    var rn = Math.floor(Math.random() * colores.length);
                    return colores[rn];
                } else {
                    return "#23BAC4";
                }
            });

        nodeEnter
            .append("image")
            .attr("href", function(d) {
                if (d.tipo == "null") {
                    return "http://127.0.0.1:8000/img/empresa.png";
                }
            })
            .attr("height", 150)
            .attr("width", 150)
            .attr("x", "-60")
            .attr("y", "-150");

        nodeEnter
            .append("image")
            .attr("href", function(d) {
                if (d.tipo == "PROVEEDOR") {
                    return (
                        "http://127.0.0.1:8000/storage/" +
                        d.image.replace("public/", "")
                    );
                }
            })
            .attr("height", 60)
            .attr("width", 60)
            .attr("x", "60")
            .attr("y", "-70");

        nodeEnter
            .append("text")
            .attr("x", function(d) {
                if (d.tipo != "null") {
                    return -90;
                }
            })
            .attr("y", function(d) {
                if (d.tipo != "null") {
                    return -10;
                }
            })
            .attr("dy", ".35em")
            .attr("fill", function(d) {
                return "white";
            })
            .text(function(d) {
                if (d.tipo != "null") {
                    return d.tipo;
                }
            });

        nodeEnter
            .append("text")
            .attr("x", function(d) {
                if (d.tipo == "null") {
                    return -90;
                } else {
                    return -80;
                }
            })
            .attr("y", function(d) {
                if (d.tipo != "null") {
                    return +10;
                }
            })
            .attr("dy", ".35em")
            .attr("fill", function(d) {
                return "white";
            })
            .text(function(d) {
                return d.name;
            });

        var addLeftChild = nodeEnter.append("g");
        addLeftChild
            .append("rect")
            .attr("x", "-120")
            .attr("y", "-10")
            .attr("height", 20)
            .attr("width", 20)
            .attr("rx", 10)
            .attr("ry", 10)
            .style("stroke", "#444")
            .style("stroke-width", "2")
            .style("fill", "#ccc");

        addLeftChild
            .append("line")
            .attr("x1", -116)
            .attr("y1", 1)
            .attr("x2", -104)
            .attr("y2", 1)
            .attr("stroke", "#444")
            .style("stroke-width", "2");

        addLeftChild
            .append("line")
            .attr("x1", -110)
            .attr("y1", -4)
            .attr("x2", -110)
            .attr("y2", 6)
            .attr("stroke", "#444")
            .style("stroke-width", "2");

        // Transition nodes to their new position.
        var nodeUpdate = node
            .transition()
            .duration(duration)
            .attr("transform", function(d) {
                if (d.tipo == "null") {
                    d.y = oldly;
                    d.x = oldlx;
                }
                return "translate(" + d.y + "," + d.x + ")";
            });

        nodeUpdate
            .select("circle")
            .attr("r", 10)
            .style("fill", function(d) {
                return d._children ? "red" : "red";
            });

        nodeUpdate.select("text").style("fill-opacity", 1);

        // Transition exiting nodes to the parent's new position.
        var nodeExit = node
            .exit()
            .transition()
            .duration(duration)
            .attr("transform", function(d) {
                return "translate(" + source.y + "," + source.x + ")";
            })
            .remove();

        nodeExit.select("circle").attr("r", 1e-6);

        nodeExit.select("text").style("fill-opacity", 1e-6);

        // Update the links…
        var link = svg.selectAll("path.link").data(links, function(d) {
            return d.target.id;
        });

        // Enter any new links at the parent's previous position.
        link.enter()
            .insert("path", "g")
            .attr("class", "link")
            .attr("d", function(d) {
                var o = {
                    x: source.x0,
                    y: source.y0
                };
                return diagonal({
                    source: o,
                    target: o
                });
            });

        // Transition links to their new position.
        link.transition()
            .duration(duration)
            .attr("d", diagonal);

        // Transition exiting nodes to the parent's new position.
        link.exit()
            .transition()
            .duration(duration)
            .attr("d", function(d) {
                var o = {
                    x: source.x,
                    y: source.y
                };
                return diagonal({
                    source: o,
                    target: o
                });
            })
            .remove();

        // Stash the old positions for transition.
        nodes.forEach(function(d) {
            d.x0 = d.x;
            d.y0 = d.y;
        });

        ///------------------izquierda
        addLeftChild.on("click", function(d) {
            event.stopPropagation();
            $("#modalizquierda").modal("show");
            $("#btnsave_izquierda").off("click");
            $("#btnsave_izquierda").on("click", function() {
                var childname = $("#name_izquierda").val();
                var image = $("#name_izquierda")
                    .children("option:selected")
                    .data("image");
                if (typeof d.children === "undefined") {
                    var newChild = [
                        {
                            name: childname,
                            parent: d.name,
                            tipo: "PROVEEDOR",
                            image: image
                        }
                    ];

                    //console.log(tree.nodes(newChild[0]));
                    var newnodes = tree.nodes(newChild);
                    d.children = newnodes[0];

                    update(d);
                } else {
                    var newChild = {
                        name: childname,
                        parent: d.name,
                        tipo: "PROVEEDOR",
                        image: image
                    };
                    d.children.push(newChild);
                    update(d);
                }
                $("#modalizquierda").modal("hide");
            });
        });
    }

    // Toggle children on click.
    function click(d) {
        console.log(valorderecha);
        if (d.tipo != "null") {
            Swal.fire({
                title: "¿Estas seguro?",
                text: "Esta seguro de eliminar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, eliminar!",
                cancelButtonText: "Cancelar"
            }).then(result => {
                if (result.isConfirmed) {
                    var id = d.id;
                    var padre = d.parent;
                    var hijos = padre.children.filter(function(hijo) {
                        return hijo.id !== id;
                    });

                    padre.children = hijos;
                    update(d);
                }
            });
        } else {
            Swal.fire({
                title: "¿Estas seguro?",
                text: "Esta seguro de Guardar",
                icon: "success",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Si, Guardar!",
                cancelButtonText: "Cancelar"
            }).then(result => {
                if (result.isConfirmed) {
                    var arregloTotal = [];
                    arregloTotal.push(returnaArreglo(valorderecha, "derecha"));
                    arregloTotal.push(returnaArreglo(d, "izquierda"));
                    $("#arreglocadena").val(JSON.stringify(arregloTotal));
                    $("#frmenviar").submit();
                }
            });
        }

        // console.log(d);
        // if (d.children) {
        //  d._children = d.children;
        //  d.children = null;
        // } else {
        //  d.children = d._children;
        //  d._children = null;
        // }
        // update(d);
    }
    function returnaArreglo(r, descripcion) {
        var arre = [];
        if (r.children != undefined) {
            r.children.forEach((value, index, array) => {
                arre.push({
                    nombre: value.name,
                    tipo: value.tipo,
                    descripcion: descripcion,
                    children:
                        value.children != undefined
                            ? returnaArreglo(value, descripcion)
                            : []
                });
            });
        }
        return arre;
    }
}
