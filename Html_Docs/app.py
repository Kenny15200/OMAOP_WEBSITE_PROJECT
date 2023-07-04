from flask import Flask, render_template

app = Flask(__name__)

@app.route('/')
def display_numbers():
    numbers = list(range(90))
    return render_template('index.html', numbers=numbers)

if __name__ == '__main__':
    app.run()
