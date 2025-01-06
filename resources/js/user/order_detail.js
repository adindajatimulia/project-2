import '@fortawesome/fontawesome-free/css/all.min.css';
import jsPDF from "jspdf";
import html2canvas from "html2canvas";

document.getElementById("downloadPDF").addEventListener("click", async () => {
    const element = document.querySelector('.invoice');
    const canvas = await html2canvas(element, { scale: 2 });
    const imgData = canvas.toDataURL("image/png");
    const pdf = new jsPDF("p", "mm", "a4");
    const imgWidth = 190;
    const pageHeight = pdf.internal.pageSize.height;
    const imgHeight = (canvas.height * imgWidth) / canvas.width;
    let position = 0;

    pdf.addImage(imgData, "PNG", 10, position, imgWidth, imgHeight);
    let heightLeft = imgHeight;

    while (heightLeft > pageHeight) {
      heightLeft -= pageHeight;
      position = heightLeft - imgHeight;
      pdf.addPage();
      pdf.addImage(imgData, "PNG", 10, position, imgWidth, imgHeight);
    }

    pdf.save("struk_pembayaran.pdf");
});