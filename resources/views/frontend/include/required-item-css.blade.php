<style>
/* ===============================
   Required Items Page – FINAL CSS
================================ */

.requiredItemsPage{
    background:#f9fafb;
    padding-bottom:60px;
}

/* ===============================
   Header / Gradient Card
================================ */
.gradientCard{
    background:linear-gradient(135deg,#ff8a00,#ffb347);
    color:#fff;
    padding:30px;
    border-radius:16px;
    margin-bottom:25px;
}

.gradientCard h3{
    font-weight:800;
    margin-bottom:8px;
}

/* ===============================
   Tabs
================================ */
.tabsWrapper{
    display:flex;
    gap:10px;
    border-bottom:2px solid #ff8a00;
    margin-bottom:20px;
}

.tabBtn{
    padding:10px 20px;
    border:1px solid #ff8a00;
    background:#fff;
    color:#ff8a00;
    border-radius:8px 8px 0 0;
    cursor:pointer;
    font-weight:600;
    transition:.3s;
}

.tabBtn:hover{
    background:#fff3e6;
}

.tabBtn.active{
    background:#ff8a00;
    color:#fff;
}

/* ===============================
   Tab Content
================================ */
.tabContent{
    display:none;
    animation:fade .3s ease-in-out;
}

.tabContent.active{
    display:block;
}

@keyframes fade{
    from{opacity:0;transform:translateY(8px);}
    to{opacity:1;transform:translateY(0);}
}

/* ===============================
   Content Card
================================ */
.contentCard,
.contentBlock{
    background:#fff;
    padding:25px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    margin-bottom:25px;
}

.contentCard h4,
.contentBlock h4{
    font-weight:800;
    margin-bottom:18px;
    position:relative;
}

.contentCard h4::after,
.contentBlock h4::after{
    content:"";
    width:40px;
    height:3px;
    background:#ff8a00;
    display:block;
    margin-top:6px;
    border-radius:3px;
}

/* ===============================
   Item List
================================ */
.itemList{
    list-style:none;
    padding:0;
    margin:0;
}

.itemList li{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:12px 16px;
    background:#f8f9fa;
    border-radius:10px;
    margin-bottom:10px;
    font-size:14px;
}

.itemList li strong{
    color:#ff8a00;
    font-weight:700;
}

/* ===============================
   Uniform Table
================================ */
.uniformTable{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:10px;
}

.uniformTable thead{
    background:#ff8a00;
    color:#fff;
}

.uniformTable th{
    padding:12px;
    font-weight:700;
}

.uniformTable td{
    padding:12px;
    border-bottom:1px solid #eee;
}

.uniformTable tbody tr:nth-child(even){
    background:#f8f9fa;
}

/* ===============================
   Important Note
================================ */
.infoNote{
    background:#d9f2f7;
    padding:15px 18px;
    border-left:5px solid #ff8a00;
    border-radius:10px;
    font-size:14px;
    margin-top:20px;
}

/* ===============================
   Sidebar
================================ */
.sideBox{
    background:#fff;
    padding:22px;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
    margin-bottom:20px;
}

.sideBox h5{
    font-weight:800;
    margin-bottom:15px;
}

.sideBox h5::after{
    content:"";
    width:30px;
    height:3px;
    background:#ff8a00;
    display:block;
    margin-top:6px;
    border-radius:3px;
}

/* Sidebar Links */
.sideLinks{
    list-style:none;
    padding:0;
    margin:0;
}

.sideLinks li{
    padding:10px 14px;
    border:1px solid #ff8a00;
    border-radius:8px;
    margin-bottom:8px;
    font-weight:600;
    color:#ff8a00;
    cursor:pointer;
    transition:.3s;
}

.sideLinks li:hover{
    background:#fff3e6;
}

.sideLinks li.active{
    background:#ff8a00;
    color:#fff;
}

/* ===============================
   Download Buttons
================================ */
.downloadBtn{
    display:block;
    padding:12px;
    background:#ff8a00;
    color:#fff;
    text-align:center;
    border-radius:8px;
    margin-bottom:10px;
    font-weight:600;
    text-decoration:none;
    transition:.3s;
}

.downloadBtn:hover{
    background:#e67700;
    color:#fff;
}

/* ===============================
   Quick Navigation (Sidebar)
================================ */
.sideLinks{
    list-style:none;
    padding:0;
    margin:0;
}

.sideLinks li{
    padding:12px 16px;
    border:1px solid #ff8a00;
    border-radius:10px;
    margin-bottom:10px;
    font-weight:600;
    color:#ff8a00;
    cursor:pointer;
    transition:.3s;
    background:#fff;
}

.sideLinks li:hover{
    background:#fff3e6;
}

.sideLinks li.active{
    background:#ff8a00;
    color:#fff;
}

.sideLinks li a{
    color:inherit;
    text-decoration:none;
    display:block;
}

/* ===============================
   Responsive Fix
================================ */
@media(max-width:768px){
    .tabsWrapper{
        flex-wrap:wrap;
    }

    .tabBtn{
        border-radius:8px;
    }

    .itemList li{
        flex-direction:column;
        align-items:flex-start;
        gap:4px;
    }
}


</style>