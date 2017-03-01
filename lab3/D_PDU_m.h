//
// Generated file, do not edit! Created by nedtool 5.0 from D_PDU.msg.
//

#ifndef __D_PDU_M_H
#define __D_PDU_M_H

#include <omnetpp.h>

// nedtool version check
#define MSGC_VERSION 0x0500
#if (MSGC_VERSION!=OMNETPP_VERSION)
#    error Version mismatch! Probably this file was generated by an earlier version of nedtool: 'make clean' should help.
#endif



// cplusplus {{
#include "A_PDU_m.h"
// }}

/**
 * Class generated from <tt>D_PDU.msg:26</tt> by nedtool.
 * <pre>
 * //
 * // TODO generated message class
 * //
 * packet D_PDU
 * {
 *     int id;
 *     A_PDU msg;
 *     int src;
 *     int dest;
 * }
 * </pre>
 */
class D_PDU : public ::omnetpp::cPacket
{
  protected:
    int id;
    A_PDU msg;
    int src;
    int dest;

  private:
    void copy(const D_PDU& other);

  protected:
    // protected and unimplemented operator==(), to prevent accidental usage
    bool operator==(const D_PDU&);

  public:
    D_PDU(const char *name=nullptr, int kind=0);
    D_PDU(const D_PDU& other);
    virtual ~D_PDU();
    D_PDU& operator=(const D_PDU& other);
    virtual D_PDU *dup() const {return new D_PDU(*this);}
    virtual void parsimPack(omnetpp::cCommBuffer *b) const;
    virtual void parsimUnpack(omnetpp::cCommBuffer *b);

    // field getter/setter methods
    virtual int getId() const;
    virtual void setId(int id);
    virtual A_PDU& getMsg();
    virtual const A_PDU& getMsg() const {return const_cast<D_PDU*>(this)->getMsg();}
    virtual void setMsg(const A_PDU& msg);
    virtual int getSrc() const;
    virtual void setSrc(int src);
    virtual int getDest() const;
    virtual void setDest(int dest);
};

inline void doParsimPacking(omnetpp::cCommBuffer *b, const D_PDU& obj) {obj.parsimPack(b);}
inline void doParsimUnpacking(omnetpp::cCommBuffer *b, D_PDU& obj) {obj.parsimUnpack(b);}


#endif // ifndef __D_PDU_M_H
