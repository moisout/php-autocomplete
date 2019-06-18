# Autocomplete

A small webproxy for google and youtube autocomplete results.

## Usage

http://autocomplete.mcdn.ch/?q=results

Will return

```
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
```


Use "cl" for choosing between clients

currently supported are:
- youtube
- google (default)

http://autocomplete.mcdn.ch/?q=results&cl=youtube

will return 

```
[
    "results esc 2019",
    "results trailer german"
    "results may vary limp bizkit",
    "results runtastic",
    "results intermittent fasting",
    "results without listening",
    "results runtastic transformation",
    "results esc",
    "results day",
    "results eurovision 2019",
]
```
