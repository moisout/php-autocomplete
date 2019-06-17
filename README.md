# Autocomplete

A small webproxy for google and youtube autocomplete results.

## Usage

http://autocomplete.mcdn.ch/?q=results

Will return

```
[
    "results",
    [
        "results esc 2019",
        "results esc",
        "results day",
        "results or excuses",
        "results eurovision 2019",
        "results without listening",
        "results eurovision 2016",
        "results app",
        "results trailer",
        "results may vary"
    ]
]
```


Use "cl" for choosing between clients

currently supported are:
- youtube
- google (default)

http://autocomplete.mcdn.ch/?q=results&cl=youtube

will return 

```
[
    "results",
    [
        [
            "results esc 2019",
            0
        ], [
            "results trailer german"
            , 0
        ], [
            "results may vary limp bizkit",
            0
        ], [
            "results runtastic",
            0
        ], [
            "results intermittent fasting",
            0
        ], [
            "results without listening",
            0
        ], [
            "results runtastic transformation",
            0
        ], [
            "results esc",
            0
        ], [
            "results day",
            0
        ], [
            "results eurovision 2019",
            0
        ]
    ], {
        "k": 1,
        "q": "Tfpqspl5-KiqHLkUksjJHnyeeCU"
    }
]
```
