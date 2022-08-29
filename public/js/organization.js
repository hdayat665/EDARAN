$(document).ready(function() {

    // department tree
    var chart = new OrgChart(document.getElementById("tree"), {
        mouseScrool: OrgChart.action.none,
        nodeBinding: {
            field_0: "name",
            field_1: "grade",
            img_0: "img"
        },
        nodes: [
            { id: 1, name: "Jonis Martin", grade: "CEO", img: "../assets/img/user/user-1.jpg" },
            { id: 2, pid: 1, name: "Sarah Hani", grade: "VP", img: "../assets/img/user/user-2.jpg" },
            { id: 3, pid: 1, name: "Hanisah Rahman", grade: "VP", img: "../assets/img/user/user-3.jpg" },
            { id: 4, pid: 1, name: "Harris Azim", grade: "Budget Analyst", img: "../assets/img/user/user-4.jpg" },
            { id: 5, pid: 2, name: "Jamilah Jaafar", grade: "Web Manager", img: "../assets/img/user/user-5.jpg" },

        ]
    });

    // organization chart
    var chart = new OrgChart(document.getElementById("orgChart"), {
        mouseScrool: OrgChart.action.none,
        template: "rony",
        nodeBinding: {
            field_0: "name",
            field_1: "grade",
            img_0: "img"
        },
        nodes: [
            { id: 1, name: "Munirah Maisarah", grade: "Manager", img: "../assets/img/user/user-1.jpg" },
            { id: 2, pid: 1, name: "Sarah Hani", grade: "Executive", img: "../assets/img/user/user-2.jpg" },
            { id: 3, pid: 1, name: "Hanisah Rahman", grade: "Executive", img: "../assets/img/user/user-3.jpg" },
            { id: 4, pid: 1, name: "Harris Azim", grade: "Executive", img: "../assets/img/user/user-4.jpg" },
            { id: 5, pid: 2, name: "Jamilah Jaafar", grade: "Junior Executive", img: "../assets/img/user/user-5.jpg" },
        ]
    });
});