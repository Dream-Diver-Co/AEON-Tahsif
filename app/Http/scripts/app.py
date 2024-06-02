from flask import Flask, request, jsonify
import PyPDF2
from pdfminer.high_level import extract_text

app = Flask(__name__)


# def extract_text_from_pdf(pdf_file_path):
#     text = ''
#     with open(pdf_file_path, 'rb') as file:
#         reader = PyPDF2.PdfReader(file)
#         for page_num in range(len(reader.pages)):
#             page = reader.pages[page_num]
#             text += page.extract_text()
#     # text = text.encode('utf-8', 'ignore').decode('utf-8')
#     return text


def extract_text_from_pdf(pdf_file_path):
    text = extract_text(pdf_file_path)
    return text


@app.route('/extract_text', methods=['POST'])
def extract_text():
    if 'pdf_file' not in request.files:
        return jsonify({'error': 'No PDF file provided.'}), 400

    pdf_file = request.files['pdf_file']
    extracted_text = extract_text_from_pdf(pdf_file)

    # Print the complete response for debugging
    response_content = {'text': extracted_text}
    print("Response Content: ", response_content)

    return jsonify(response_content)


if __name__ == '__main__':
    app.run(debug=True)
