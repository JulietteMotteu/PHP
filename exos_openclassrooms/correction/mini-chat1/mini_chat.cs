using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace New_test
{
    #region Mini_chat
    public class Mini_chat
    {
        #region Member Variables
        protected int _id;
        protected string _nom;
        protected string _message;
        protected DateTime _date;
        #endregion
        #region Constructors
        public Mini_chat() { }
        public Mini_chat(string nom, string message, DateTime date)
        {
            this._nom=nom;
            this._message=message;
            this._date=date;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Nom
        {
            get {return _nom;}
            set {_nom=value;}
        }
        public virtual string Message
        {
            get {return _message;}
            set {_message=value;}
        }
        public virtual DateTime Date
        {
            get {return _date;}
            set {_date=value;}
        }
        #endregion
    }
    #endregion
}